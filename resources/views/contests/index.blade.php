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
            <td>截止日期</td>
            <td>建立者</td>
            <td>動作</td>
        </tr>
    </thead>
    <tbody>
        @foreach($contests as $contest)
        <tr>
            <td>{{ $contest->title }}</td>
            <td>{{ $contest->office }}</td>
            <td>{{ $contest->deadline }}</td>
            <td>{{ $contest->name }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the project (uses the show method found at GET /projects/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('competition/' . $contest->id) }}">檢視</a>
                <!-- edit this project (uses the edit method found at GET /projects/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('contests/' . $contest->id . '/edit') }}">修改</a>
                <!-- delete the project (uses the destroy method DESTROY /projects/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'contests/' . $contest->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('刪除', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection