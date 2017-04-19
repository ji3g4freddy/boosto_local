@extends('layouts.app')
@section('title','New Post')
@section('content')
<h1>Create a post</h1>
<!-- if there are creation errors, they will show here -->
<!-- <form method="POST" action="{{ url('/posts') }}">
  <div class="form-group">
    <label for="Title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="Content">Content</label>
    <textarea class="form-control" id="Content" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Create Post</button>
</form> -->
{{ Form::open(array('url' => 'posts')) }}
<div class="form-group">
  {{ Form::label('title', 'Title') }}
  {{ Form::text('title', '', array('class' => 'form-control', 'placeholder'=>'Enter Title')) }}
</div>
<div class="form-group">
  {{ Form::label('content', 'Content') }}
  {{ Form::textarea('content', '', array('class' => 'form-control', 'placeholder'=>'Enter Content')) }}
</div>
{{ Form::submit('Create the post!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection