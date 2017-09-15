@extends('layouts.master')
@section('title','錄音室介紹')
@section('sm-header')
<div class="banner-info text-center wow fadeIn delay-05s">
    <div class="col-md-12 text-center">
        <h2 class="sm-header-title">{{ $studio->studio }}</h2>
        <h1 class="bnr-title">{{ $studio->place }}</h1>
    </div>
</div>
@endsection
@section('content')
@include('layouts.partials2.jumbotron')
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
        <br><br><br>
            <div class="row">
            <div class="col-md-12 col-sm-12 portfolio-item">
                <div id="panorama"></div>
                <style type="text/css">
                    .portfolio-item{
                        text-align: left;
                    }
                </style>
                <script>
                pannellum.viewer('panorama', {
                "type": "equirectangular",
                "panorama": "{{url('img/studio/'.$studio->image)}}",
                "title": "${{ $studio->price }} TWD/小時",
                "autoLoad": true,
                "autoRotate": -1,
                "hfov": 300,
                "yaw": 180
                });
                </script>
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-volume-up" aria-hidden="true"></i>&nbsp<strong>錄音室簡介</strong></legend>
                <p>{{ $studio->content }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-volume-up" aria-hidden="true"></i>&nbsp<strong>錄音室規模</strong></legend>
                <p>{{ $studio->level }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-volume-up" aria-hidden="true"></i>&nbsp<strong>設備清單</strong></legend>
                <p>{{ $studio->equip }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-volume-up" aria-hidden="true"></i>&nbsp<strong>錄音師風格＆作品連結</strong></legend>
                <p>{{ $studio->style1 }} <a href="{{ $studio->link1 }}" target="_blank">{{ $studio->link1 }}</a></p>
                <p>{{ $studio->style2 }} <a href="{{ $studio->link2 }}" target="_blank">{{ $studio->link2 }}</a></p>
                <p>{{ $studio->style3 }} <a href="{{ $studio->link3 }}" target="_blank">{{ $studio->link3 }}</a></p>                                
            </fieldset>
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12 text-center">
            <fieldset>
                <div class="brn-btn">
                    <a href="https://goo.gl/forms/Kz24d9qqxkfYRoe43" target="_blank" class="btn btn-more">立即預約</a>
                </div>
            </fieldset>
            </div>
            </div>
            <br><br><br>
        </div>
    </section> 
@endsection
