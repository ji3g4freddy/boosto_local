@extends('layouts.app')
@section('title', '預覽錄音室')
@section('content')
<h1>{{ $article->title }}</h1>
<div class="banner-info text-center wow fadeIn delay-05s">
    <div class="col-md-12 text-center">
        <h2 class="sm-header-title">{{ $article->studio }}</h2>
        <h1 class="bnr-title">{{ $article->place }}</h1>
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
                "panorama": "{{url('img/'.$article->image)}}",
                "title": "${{ $article->price }} TWD/小時",
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
                <p>{{ $article->content }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-volume-up" aria-hidden="true"></i>&nbsp<strong>錄音室規模</strong></legend>
                <p>{{ $article->level }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-volume-up" aria-hidden="true"></i>&nbsp<strong>設備清單</strong></legend>
                <p>{{ $article->equip }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-volume-up" aria-hidden="true"></i>&nbsp<strong>錄音師風格＆作品連結</strong></legend>
                <p>{{ $article->style1 }} <a href="{{ $article->link1 }}" target="_blank">{{ $article->link1 }}</a></p>
                <p>{{ $article->style2 }} <a href="{{ $article->link2 }}" target="_blank">{{ $article->link2 }}</a></p>
                <p>{{ $article->style3 }} <a href="{{ $article->link3 }}" target="_blank">{{ $article->link3 }}</a></p>   
            </fieldset>
            </div>
            </div>
            <br><br><br>
        </div>
    </section> 

@endsection