@extends('layouts.master')
@section('title','錄音室介紹')
@section('sm-header')
<div class="banner-info text-center wow fadeIn delay-05s">
    <div class="col-md-12 text-center">
        <h2 class="sm-header-title">{{ $competition->title }}</h2>
        <h1 class="bnr-title">報名截止：{{ $competition->deadline }}</h1>
    </div>
</div>
@endsection
@section('content')
<style>
    .sm-header{
    background: url('{{ asset('img/competition_image/'.$competition->image)}}') no-repeat;
    background-size: cover;
    background-position: 0px -100px; 
    color:white;
    min-height: 300px;
    position: relative;
}
</style>
@include('layouts.partials2.jumbotron')
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
        <br><br><br>
<!--             <div class="row">
            <div class="col-md-6 col-sm-6 portfolio-item">
                <img src="{{ asset('img/competition_logo/'.$competition->logo)}}" class="img-responsive">
            </div>
            <div class="col-lg-6">
            <fieldset>
                <legend><i class="fa fa-volume-up" aria-hidden="true"></i>&nbsp<strong>比賽名稱</strong></legend>
                <p>{{ $competition->titile }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br> -->
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp<strong>比賽介紹</strong></legend>
                <p>{{ $competition->intro }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp<strong>比賽資訊</strong></legend>
                <p>{{ $competition->info }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp<strong>報名資訊</strong></legend>
                <p>{{ $competition->register }}</p>
            </fieldset>
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12">
            <fieldset>
                <legend><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp<strong>官方連結</strong></legend>
                <p><a href="{{ $competition->link }}" target="_blank">{{ $competition->link }}</a></p>                                
            </fieldset>
            </div>
            </div>
            <br><br><br>
            <div class="row">
            <div class="col-lg-12 text-center">
            <fieldset>
                <div class="brn-btn">
                    <a href="#aboutModal1" class="btn btn-more" data-toggle="modal">使用BoostO優惠</a>
                </div>
            </fieldset>
            </div>
            </div>
            <br><br><br>
        </div>
    </section> 

        <!-- About Modal 1 -->
<div id="aboutModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">BoostO錄音體驗免費一小時優惠</h4>
      </div>
      <div class="modal-body">
        <form action="check_finish.php" method="post">
        <fieldset>
          <h3>請輸入以下資訊</h3>
          <br>
          <label for="type">*參賽組別:</label>
          <select id="type" name="type">
            <option value="">無分組</option>
            <option value="solo">獨唱組</option>
            <option value="feat">重唱組</option>
            <option value="original">創作組</option>
            <option value="guitar">指彈組</option>
        </select>
          <br>
          <label for="number">*參賽編號:</label>
          <input type="text" id="number" name="number" required>
          <br>
          <label for="password">*優惠序號:</label>
          <input type="text" id="password" name="password" required>
          <input type="hidden" id="competition" name="competition" value='15'>
        </fieldset>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">確認</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>

@endsection
