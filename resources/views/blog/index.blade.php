@extends('layouts.master')
@section('title','BoostO部落格')
@section('sm-header')
<div class="banner-info text-center wow fadeIn delay-05s">
    <div class="col-md-12 text-center">
     	<h2 class="sm-header-title">Boost<span class="logo-dec">O</span>部落格</h2>
        <h1 class="bnr-title">音樂夥伴的音樂歷程分享!</h1>
    </div>
</div>
@endsection
@section('content')
<style>
    .sm-header{
    background: url('{{ asset('img/jumbotron_blog.jpeg')}}') no-repeat;
    background-size: cover;
    background-position: 0px -100px; 
    color:white;
    min-height: 300px;
    position: relative;
}
</style>
@include('layouts.partials2.jumbotron')
<section id="blog" class="section-padding wow fadeInUp delay-05s">
  <div class="container">
    <div class="row">
        @foreach($blog as $key => $value)
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="blog-sec">
              <div class="blog-img">
                <a href="{{ url('blog/'.$value->id)}}">
                  <img src="{{ asset('img/blog_logo/'.$value->logo)}}" class="img-responsive">
                </a>
              </div>
              <div class="blog-info">
                <h2>{{ $value->title }}</h2>
                <div class="blog-comment">
                    <p>作者: <span>{{ $value->name }}</span></p>
                </div>
                <p>{{ $value->hashtag }}</p>
                <a href="" class="read-more">Read more →</a>
              </div>
            </div>
          </div>
        @endforeach
    </div>
  </div>
</section>
@endsection
