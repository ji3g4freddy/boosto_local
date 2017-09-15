@extends('layouts.app')
@section('title','預覽錄音室')
@section('sm-header')
<div class="banner-info text-center wow fadeIn delay-05s">
    <div class="col-md-12 text-center">
        <h2 class="sm-header-title">{{ $contest->title }}</h2>
        <h1 class="bnr-title">報名截止：{{ $contest->deadline }}</h1>
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
                <img src="{{ asset('img/competition_image/'.$contest->image)}}" style="width: 80%; height: auto; display:block; margin:auto;">
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp<strong>比賽介紹</strong></legend>
                <p>{{ $contest->intro }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp<strong>比賽資訊</strong></legend>
                <p>{{ $contest->info }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp<strong>報名資訊</strong></legend>
                <p>{{ $contest->register }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp<strong>官方連結</strong></legend>
                <p><a href="{{ $contest->link }}" target="_blank">{{ $contest->link }}</a></p>                                
            </fieldset>
            </div>
            </div>
            <br><br><br>
        </div>
    </section> 

@endsection
