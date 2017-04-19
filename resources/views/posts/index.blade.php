@extends('layouts.app')
@section('title','Homepage')
@section('content')
<h1>All the posts</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Title</td>
            <td>Content</td>
            <td>Author</td>
            <td>Create Date</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $key => $value)
        <tr>
            <td>{{ $value->title }}</td>
            <td>{{ $value->content }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->created_at }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the post (uses the show method found at GET /posts/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('posts/' . $value->id) }}">Show this post</a>
                <!-- edit this post (uses the edit method found at GET /posts/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('posts/' . $value->id . '/edit') }}">Edit this post</a>
                <!-- delete the post (uses the destroy method DESTROY /posts/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'posts/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete this post', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection