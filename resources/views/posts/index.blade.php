@extends('layouts.app')
@section('title','我的錄音室')
@section('content')

<h1>我的錄音室</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>錄音室</td>
            <td>錄音師</td>
            <td>價錢/小時</td>
            <td class="hidden-xs">建立日期</td>
            <td>狀態</td>
            <td>進階</td>
        </tr>
    </thead>
    <tbody>
        @if (Auth::user()->role == 'user')

        @foreach($posts as $key => $value)

        <tr>
            <td>{{ $value->studio }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->price }}</td>
            <td class="hidden-xs">{{ $value->created_at }}</td>
            <td>
            @if ($value->verify==0)
            待審核
            @elseif($value->verify==1)
            審核通過
            @elseif($value->verify==2)
            <strong style="color: red">審核未過</strong>
            @endif
            </td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the post (uses the show method found at GET /posts/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('posts/' . $value->id) }}">詳細內容</a>
                <!-- edit this post (uses the edit method found at GET /posts/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('posts/' . $value->id . '/edit') }}">修改內容</a>
                <!-- delete the post (uses the destroy method DESTROY /posts/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'posts/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('刪除錄音室', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach

        @elseif (Auth::user()->role == 'superuser')
        
        @foreach($s_posts as $key => $value)

        <tr>
            <td>{{ $value->studio }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->price }}</td>
            <td class="hidden-xs">{{ $value->created_at }}</td>
            <td>
            @if ($value->verify==0)
            <strong style="color: red">待審核</strong>
            @elseif($value->verify==1)
            審核通過
            @elseif($value->verify==2)
            <strong style="color: red">審核未過</strong>
            @endif
            </td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the post (uses the show method found at GET /posts/{id} -->
                <a class="btn btn-small btn-success pull-left" href="{{ URL::to('posts/' . $value->id) }}">詳細內容</a>
                <!-- edit this post (uses the edit method found at GET /posts/{id}/edit -->

                <!-- delete the post (uses the destroy method DESTROY /posts/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'verify_no/' . $value->id, 'class' => 'pull-left')) }}
                {{ Form::hidden('_method', 'PATCH') }}
                {{ Form::submit('審核不過', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                {{ Form::open(array('url' => 'verify/' . $value->id, 'class' => 'pull-left')) }}
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