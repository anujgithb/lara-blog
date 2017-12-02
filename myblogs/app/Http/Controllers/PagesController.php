<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use App\Post;
use Session;

class PagesController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at','desc')->limit(5)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function post_contact(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'subject' => 'min:3',
            'message' => 'required|min:10'
            ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'body_message' => $request->message
        ];
        Mail::send('email.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('anuj.pcubelive@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your message has been sent');
        return redirect('contact');
    }
}
