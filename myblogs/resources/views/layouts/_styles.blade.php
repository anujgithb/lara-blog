<!-- Styles -->
<link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

{{-- Font-awesome   --}}

<link rel="stylesheet" href="{{ asset('public/font-awesome-4.7.0/css/font-awesome.min.css') }}">

{{--  Tinymce editor  --}}
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?api_key=ufb9rsji5zun0bvblfmygk51i898vgk0oo2t2ep7uxddrmbf"></script>
<script>
tinymce.init({ 
    selector:'textarea',
    plugins:'link' ,
    menubar:false
    });</script>