@extends('layouts.master')
@section('title','合作比賽')
@section('sm-header')
<div class="banner-info text-center wow fadeIn delay-05s">
    <div class="col-md-12 text-center">
     	<h2 class="sm-header-title">Boost<span class="logo-dec">O</span>合作比賽</h2>
        <h1 class="bnr-title">各大比賽資訊以及錄音優惠!</h1>
    </div>
</div>
@endsection
@section('content')
<style>
    .sm-header{
    background: url('{{ asset('img/jumbotron_competition.jpeg')}}') no-repeat;
    background-size: cover;
    background-position: 0px -100px; 
    color:white;
    min-height: 300px;
    position: relative;
}
</style>
@include('layouts.partials2.jumbotron')
<section id="studio" class="section-padding wow fadeInUp delay-05s">
  <div class="container">
    <div class="row">
      @foreach($competition as $key => $value)
      <div class="col-md-4 col-xs-12">
        <div class="studio-sec">
          <div class="studio-img">
            <a href="{{ url('competition/'.$value->id)}}">
              <img src="{{ asset('img/competition_logo/'.$value->logo)}}" class="img-responsive">
            </a>
          </div>
<!--           <div class="studio-link">
                <a href="https://goo.gl/forms/Kz24d9qqxkfYRoe43" target="_blank">使用優惠</a>
          </div>         -->
            <div class="studio-name">
                {{ $value->title }}
            </div>
                
            <div class="studio-detail">
                主辦單位：{{ $value->office }} <br/>
                報名截止：{{ $value->deadline }}
            </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
