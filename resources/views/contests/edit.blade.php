@extends('layouts.app')
@section('title','修改')
@section('content')
<h1>修改 {{ $contest->title }}</h1>
<!-- if there are creation errors, they will show here -->
{{ Form::model($contest, array('route' => array('contests.update', $contest->id), 'files' => true, 'method' => 'PUT')) }}
<div class="form-group">
  {{ Form::label('title', '比賽名稱') }}
  {{ Form::text('title', null, array('class' => 'form-control', 'placeholder'=>'輸入比賽名稱')) }}
</div>
<div class="form-group">
  {{ Form::label('office', '主辦單位') }}
  {{ Form::text('office', null, array('class' => 'form-control', 'placeholder'=>'主辦單位/學校')) }}
</div>
<div class="form-group">
  {{ Form::label('deadline', '截止日期') }}
  {{ Form::datetime('deadline', null, array('class' => 'form-control', 'placeholder'=>'')) }}
</div>
<div class="form-group">
    {!! Form::label('logo', '比賽logo') !!}
    <a href="{{url('img/competition_logo/'.$contest->logo)}}" target="_blank"> {{ $contest->logo }} </a>
    <br>重新上傳：{{ Form::file('logo', null, array('class' => 'form-control' )) }}
</div>
<div class="form-group">
    {!! Form::label('image', '封面照片') !!}
    <a href="{{url('img/competition_image/'.$contest->image)}}" target="_blank"> {{ $contest->image }} </a>
    <br>重新上傳：{{ Form::file('image', null, array('class' => 'form-control' )) }}
</div>
<div class="form-group">
  {{ Form::label('intro', '比賽簡介') }}
  {{ Form::textarea('intro', null, array('class' => 'form-control', 'placeholder'=>'')) }}
</div>
<div class="form-group">
  {{ Form::label('info', '比賽資訊') }}
  {{ Form::textarea('info', null, array('class' => 'form-control', 'placeholder'=>'')) }}
</div>
<div class="form-group">
  {{ Form::label('register', '報名資訊') }}
  {{ Form::textarea('register', null, array('class' => 'form-control', 'placeholder'=>'')) }}
</div>
<div class="form-group">
  {{ Form::label('link', '官方連結') }}
  {{ Form::text('link', null, array('class' => 'form-control', 'placeholder'=>'http://')) }}
</div>
{{ Form::submit('修改!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection