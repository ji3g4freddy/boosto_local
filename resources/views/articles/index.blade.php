@extends('layouts.app')
@section('title','文章總覽')
@section('content')
<h1>文章列表</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>文章標題</td>
            <td>文章類別</td>
            <td>文章作者</td>
            <td>建立日期</td>
            <td>動作</td>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
        <tr>
            <td>{{ $article->title }}</td>
            <td>{{ $article->hashtag }}</td>
            <td>{{ $article->name }}</td>
            <td>{{ $article->created_at }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the article (uses the show method found at GET /articles/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('articles/' . $article->id .'/show') }}">內文</a>
                <!-- edit this article (uses the edit method found at GET /articles/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('articles/' . $article->id . '/edit') }}">修改</a>
                <!-- delete the article (uses the destroy method DESTROY /articles/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'articles/' . $article->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('刪除', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection