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
            <td class="hidden-xs">建立日期</td>
            <td>狀態</td>
            <td>進階</td>
        </tr>
    </thead>
    <tbody>
        @if (Auth::user()->role == 'user')

        @foreach($articles as $key => $article)

        <tr>
            <td>{{ $article->title }}</td>
            <td>{{ $article->hashtag }}</td>
            <td>{{ $article->name }}</td>
            <td class="hidden-xs">{{ $article->created_at }}</td>
            <td>
            @if ($article->verify==0)
            待審核
            @elseif($article->verify==1)
            審核通過
            @elseif($article->verify==2)
            <strong style="color: red">審核未過</strong>
            @endif
            </td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the post (uses the show method found at GET /posts/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('articles/' . $article->id) }}">詳細內容</a>
                <!-- edit this post (uses the edit method found at GET /posts/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('articles/' . $article->id . '/edit') }}">修改內容</a>
                <!-- delete the post (uses the destroy method DESTROY /posts/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'articles/' . $article->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('刪除文章', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach

        @elseif (Auth::user()->role == 'superuser')
        
        @foreach($s_articles as $key => $article)

        <tr>
            <td>{{ $article->title }}</td>
            <td>{{ $article->hashtag }}</td>
            <td>{{ $article->name }}</td>
            <td class="hidden-xs">{{ $article->created_at }}</td>
            <td>
            @if ($article->verify==0)
            <strong style="color: red">待審核</strong>
            @elseif($article->verify==1)
            審核通過
            @elseif($article->verify==2)
            <strong style="color: red">審核未過</strong>
            @endif
            </td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the post (uses the show method found at GET /posts/{id} -->
                <a class="btn btn-small btn-success pull-left" href="{{ URL::to('articles/' . $article->id) }}">詳細內容</a>
                <!-- edit this post (uses the edit method found at GET /posts/{id}/edit -->

                <!-- delete the post (uses the destroy method DESTROY /posts/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'verifya_no/' . $article->id, 'class' => 'pull-left')) }}
                {{ Form::hidden('_method', 'PATCH') }}
                {{ Form::submit('審核不過', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                {{ Form::open(array('url' => 'verifya/' . $article->id, 'class' => 'pull-left')) }}
                {{ Form::hidden('_method', 'PATCH') }}
                {{ Form::submit('審核通過', array('class' => 'btn btn-info')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
        
        @endif
    </tbody>
</table>
@endsection