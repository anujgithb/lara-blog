@extends('layouts.app') 
@section('title','| Contact page') 
@section('content')
<div class="container">
  <div class="panel">
    <div class="panel-body">
<div class="row">
  <div class="col-md-12">
    <h1>Contact Me</h1>
    <form action="{{ url('contact') }}" method='POST'>
      {{ csrf_field() }}
      <div class="form-group">
        <label for="" name="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
      </div>

      <div class="form-group">
        <label for="" name="subject">Subject</label>
        <input type="text" name="subject" class="form-control" id="subject">
      </div>

      <div class="form-group">
        <label for="" name="message">Message</label>
        <textarea name="message" class="form-control" id="message" placeholder="Please type your message..."></textarea>
      </div>

      <input type="submit" value="Send Message" class="btn btn-success">
    </form>
    </div>
  </div>
</div>
  </div>
</div>
@endsection