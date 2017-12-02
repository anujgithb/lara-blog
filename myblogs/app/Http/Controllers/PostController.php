<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use \App\Category;
use \App\Tag;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        // validate the data
        $this->validate($request,[
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required',
            'featured_image' => 'sometimes|image'
            ]);
            
            
        // store data to db
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);
        
        Session::flash('success', 'The post is saved successfully.');
        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tag_arr = [];
        foreach($tags as $tag)
        {
            $tag_arr[$tag->id] = $tag->name;
        }
        
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tag_arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // store data to db
        $post = Post::find($id);

        // validate the data
        /* if($request->input('slug') == $post->slug){
            
            $this->validate($request,[
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'body' => 'required'
            ]);

        }else{ */

            $this->validate($request,[
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'body' => 'required',
                'featured_imgae' => 'image'
            ]);
        /* } */

        
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));

        
        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $oldimage = $post->image;
            $post->image = $filename;
            Storage::delete($oldimage);
        }

        $post->save();

        if(!empty($request->tags)){
            $post->tags()->sync($request->tags, true);
        }else{
            $post->tags()->sync([], true);
        }
        
        Session::flash('success', 'The post is saved successfully.');
        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        Storage::delete($post->image);
        $post->delete();
        $post->tags()->detach();
        Session::flash('success', 'The post is deleted successfully.');
        return redirect()->route('posts.index');
    }
}
