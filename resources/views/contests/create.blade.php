@extends('layouts.app')
@section('title','建立比賽')
@section('content')
<h1>建立比賽</h1>
<!-- if there are creation errors, they will show here --> 
<form method="POST" enctype="multipart/form-data" action="{{ url('/contests') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="title">比賽名稱</label>
    <input type='text' class="form-control" id="title" name="title" placeholder="輸入比賽名稱" required/>
  </div>
  <div class="form-group">
    <label for="office">主辦單位</label>
    <input type='text' class="form-control" id="office" name="office" placeholder="主辦單位/學校" required/>
  </div>
  <div class="form-group">
    <label for="deadline">截止日期</label>
    <input type='datetime-local' class="form-control" id="deadline" name="deadline" placeholder="" required/>
  </div>
  <div class="form-group">
    {!! Form::label('比賽活動大頭貼') !!}
    {!! Form::file('logo') !!}
  </div>
    <div class="form-group">
    {!! Form::label('封面照片') !!}
    {!! Form::file('image') !!}
  </div>
  <div class="form-group">
    <label for="intro">比賽簡介</label>
    <textarea class="form-control" id="intro" rows="5" name="intro" placeholder=""></textarea>
  </div>
  <div class="form-group">
    <label for="info">比賽資訊</label>
    <textarea class="form-control" id="info" rows="5" name="info" placeholder=""></textarea>
  </div>
  <div class="form-group">
    <label for="register">報名資訊</label>
    <textarea class="form-control" id="register" rows="5" name="register" placeholder=""></textarea>
  </div>
  <div class="form-group">
    <label for="link">官方連結</label>
    <input type='text' class="form-control" id="name" name="link" placeholder="http://" />
  </div>
  <button type="submit" class="btn btn-primary">登記</button>
</form>
@endsection