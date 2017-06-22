@extends('layouts.app')
@section('title','修改文章')
@section('content')
<h1>修改文章</h1>
<!-- if there are creation errors, they will show here -->
{{ Form::model($article, array('route' => array('articles.update', $article->id), 'files' => true, 'method' => 'PUT')) }}
<div class="form-group">
  {{ Form::label('title', '標題') }}
  {{ Form::text('title', null, array('class' => 'form-control', 'placeholder'=>'輸入文章標題')) }}
</div>
<div class="form-group">
    {!! Form::label('logo', '預覽圖片') !!}
    <a href="{{url('img/blog_logo/'.$article->logo)}}" target="_blank"> {{ $article->logo }} </a>
    <br>重新上傳：{{ Form::file('logo', null, array('class' => 'form-control' )) }}
</div>
<div class="form-group">
  {{ Form::label('hashtag', '標籤') }}
  {{ Form::text('hashtag', null, array('class' => 'form-control', 'placeholder'=>'#文章類別')) }}
</div>
<div class="form-group">
    {!! Form::label('image', '封面照片') !!}
    <a href="{{url('img/blog_image/'.$article->image)}}" target="_blank"> {{ $article->image }} </a>
    <br>重新上傳：{{ Form::file('image', null, array('class' => 'form-control' )) }}
</div>
<div class="form-group">
  {{ Form::label('content', '內容') }}
  {{ Form::textarea('content', null, array('class' => 'form-control', 'placeholder'=>'')) }}
</div>
{{ Form::submit('修改!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection