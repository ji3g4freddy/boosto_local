@extends('layouts.app')
@section('title', '預覽錄音室')
@section('content')
<h1>{{ $post->title }}</h1>
<div class="banner-info text-center wow fadeIn delay-05s">
    <div class="col-md-12 text-center">
        <h2 class="sm-header-title">{{ $post->studio }}</h2>
        <h1 class="bnr-title">{{ $post->place }}</h1>
    </div>
</div>
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
        <br><br><br>
            <div class="row">
            <div class="col-md-12 col-sm-12 portfolio-item">
                <div id="panorama"></div>
                <script>
                pannellum.viewer('panorama', {
                "type": "equirectangular",
                "panorama": "{{url('img/'.$post->image)}}",
                "title": "${{ $post->price }} TWD/小時",
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
                <p>{{ $post->content }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-volume-up" aria-hidden="true"></i>&nbsp<strong>錄音室規模</strong></legend>
                <p>{{ $post->level }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-volume-up" aria-hidden="true"></i>&nbsp<strong>設備清單</strong></legend>
                <p>{{ $post->equip }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-volume-up" aria-hidden="true"></i>&nbsp<strong>錄音師風格＆作品連結</strong></legend>
                <p>{{ $post->style1 }} <a href="{{ $post->link1 }}" target="_blank">{{ $post->link1 }}</a></p>
                <p>{{ $post->style2 }} <a href="{{ $post->link2 }}" target="_blank">{{ $post->link2 }}</a></p>
                <p>{{ $post->style3 }} <a href="{{ $post->link3 }}" target="_blank">{{ $post->link3 }}</a></p>   
            </fieldset>
            </div>
            </div>
            <br><br><br>
        </div>
    </section> 

@endsection