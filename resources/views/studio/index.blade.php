@extends('layouts.master')
@section('title','BoostO錄音室')
@section('sm-header')
<div class="banner-info text-center wow fadeIn delay-05s">
    <div class="col-md-12 text-center">
     	<h2 class="sm-header-title">Boost<span class="logo-dec">O</span>錄音室</h2>
        <h1 class="bnr-title">在 BoostO 找到最適合你風格、價格的錄音室!</h1>
    </div>
</div>
@endsection
@section('content')
@include('layouts.partials2.jumbotron')
<section id="studio" class="section-padding wow fadeInUp delay-05s">
  <div class="container">
    <div class="row">
      @foreach($studio as $key => $value)
      <div class="col-md-4 col-xs-12">
        <div class="studio-sec">
          <div class="studio-img">
            <a href="{{ url('studio/'.$value->id)}}">
              <img src="{{ asset('img/logo/'.$value->logo)}}" class="img-responsive">
            </a>
          </div>
          <div class="studio-link">
                <a href="https://goo.gl/forms/Kz24d9qqxkfYRoe43" target="_blank">立即預約</a>
            </div>        
            <div class="studio-name">
                {{ $value->studio }}
            </div>
                
            <div class="studio-detail">
                <strong>${{ $value->price }}</strong> TWD/小時 <br/>
                {{$value->style1}} {{$value->style2}} {{$value->style3}}
            </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
