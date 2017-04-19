@extends('layouts.app')
@section('title','Edit Post')
@section('content')
<h1>Edit {{ $post->title }}</h1>
<!-- if there are creation errors, they will show here -->
{{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, array('class' => 'form-control', 'placeholder'=>'Enter Title')) }}
</div>
<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, array('class' => 'form-control', 'placeholder'=>'Enter Content')) }}
</div>
{{ Form::submit('Edit the post!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection