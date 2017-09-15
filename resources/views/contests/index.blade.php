@extends('layouts.app')
@section('title','合作比賽總覽')
@section('content')
<h1>比賽列表</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>比賽名稱</td>
            <td>主辦單位</td>
            <td class="hidden-xs">截止日期</td>
            <td class="hidden-xs">建立者</td>
            <td>狀態</td>
            <td>進階</td>
        </tr>
    </thead>
    <tbody>
        @if (Auth::user()->role == 'user')

        @foreach($contests as $key => $contest)
        <tr>
            <td>{{ $contest->title }}</td>
            <td>{{ $contest->office }}</td>
            <td class="hidden-xs">{{ $contest->deadline }}</td>
            <td class="hidden-xs">{{ $contest->name }}</td>
            <td>
            @if ($contest->verify==0)
            待審核
            @elseif($contest->verify==1)
            審核通過
            @elseif($contest->verify==2)
            <strong style="color: red">審核未過</strong>
            @endif
            </td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the project (uses the show method found at GET /projects/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('competition/' . $contest->id) }}">詳細內容</a>
                <!-- edit this project (uses the edit method found at GET /projects/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('contests/' . $contest->id . '/edit') }}">修改內容</a>
                <!-- delete the project (uses the destroy method DESTROY /projects/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'contests/' . $contest->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('刪除比賽', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach

        @elseif (Auth::user()->role == 'superuser')

        @foreach($contests as $key => $contest)
        <tr>
            <td>{{ $contest->title }}</td>
            <td>{{ $contest->office }}</td>
            <td class="hidden-xs">{{ $contest->deadline }}</td>
            <td class="hidden-xs">{{ $contest->name }}</td>
            <td>
            @if ($contest->verify==0)
            待審核
            @elseif($contest->verify==1)
            審核通過
            @elseif($contest->verify==2)
            <strong style="color: red">審核未過</strong>
            @endif
            </td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the project (uses the show method found at GET /projects/{id} -->
                <a class="btn btn-small btn-success pull-left" href="{{ URL::to('contests/' . $contest->id) }}">詳細內容</a>

                {{ Form::open(array('url' => 'verifyc_no/' . $contest->id, 'class' => 'pull-left')) }}
                {{ Form::hidden('_method', 'PATCH') }}
                {{ Form::submit('審核不過', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                {{ Form::open(array('url' => 'verifyc/' . $contest->id, 'class' => 'pull-left')) }}
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