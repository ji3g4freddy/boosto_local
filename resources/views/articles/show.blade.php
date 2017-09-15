@extends('layouts.app')
@section('title','文章內容')
@section('sm-header')
<div class="banner-info text-center wow fadeIn delay-05s">
    <div class="col-md-12 text-center">
        <h2 class="sm-header-title">{{ $article->title }}</h2>
        <h1 class="bnr-title">Posted by <span class="logo-dec">{{ $article->name }}</span> on <span class="logo-dec">{{ $article->updated_at }}</span></h1>
    </div>
</div>
@endsection
@section('content')
<style>
    .sm-header{
    background-size: cover;
    background-position: 0px -100px; 
    color:black;
    position: relative;
}
</style>
@include('layouts.partials2.jumbotron')
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
        <br><br><br>
            <div class="row">
            <div class="col-md-12 col-sm-12 portfolio-item">
                <img src="{{ asset('img/blog_image/'.$article->image)}}" style="width: 80%; height: auto; display:block; margin:auto;">
            </div>
            </div>
            <br><br><br>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                <p>{{ $article->content }}</p>
            </div>
            <br><br><br>
        </div>
        <br><br>
    </section> 
@endsection
