@extends('layouts.app')
@section('title','新增文章')
@section('content')
<h1>新增文章</h1>
<!-- if there are creation errors, they will show here --> 
<form method="POST" enctype="multipart/form-data" action="{{ url('/articles') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="title">標題</label>
    <input type='text' class="form-control" name="title" id="title" placeholder="輸入文章標題" required/>
  </div>
  <div class="form-group">
    {!! Form::label('文章預覽照片') !!}
    {!! Form::file('logo') !!}
  </div>
  <div class="form-group">
    <label for="hashtag">副標題</label>
    <input type='text' class="form-control" name="hashtag" id="hashtag" placeholder="副標顯示於預覽區" />
  </div>
  <div class="form-group">
    {!! Form::label('文章封面照片') !!}
    {!! Form::file('image') !!}
  </div>
  <div class="form-group">
    <label for="content">內容</label>
    <textarea class="form-control" id="content" name="content" rows="10" placeholder="" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">新增文章</button>
</form>
@endsection