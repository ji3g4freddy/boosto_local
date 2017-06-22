@extends('layouts.master')
@section('title','首頁')
@section('content')
@include('layouts.partials2.header')
<section id="blog" class="section-padding wow fadeInUp delay-05s">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="service-title pad-bt15">Boost<span class="logo-dec">O</span>精選錄音室</h2>
        <p class="sub-title pad-bt15">我們提供最優質的錄音室</p>
        <hr class="bottom-line">
      </div>
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
@include('layouts.partials2.service')
@include('layouts.partials2.contact')
@endsection
