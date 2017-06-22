@extends('layouts.app')
@section('title','修改錄音室')
@section('content')
<h1>修改 {{ $post->studio }}</h1>
<!-- if there are creation errors, they will show here -->
{{ Form::model($post, array('route' => array('posts.update', $post->id), 'files' => true, 'method' => 'PUT')) }}
<div class="form-group">
    {{ Form::label('studio', '錄音室名稱') }}
    {{ Form::text('studio', null, array('class' => 'form-control', 'placeholder'=>'???')) }}
</div>
<div class="form-group">
    {{ Form::label('price', '服務收費(以小時計費)') }}
    {{ Form::number('price', null, array('class' => 'form-control', 'placeholder'=>'')) }}
</div>
<div class="form-group">
    {{ Form::label('content', '錄音室簡介') }}
    {{ Form::textarea('content', null, array('class' => 'form-control', 'placeholder'=>'', 'rows' => 5)) }}
</div>
<div class="form-group">
    {!! Form::label('logo', '錄音室logo') !!}
    <a href="{{url('img/logo/'.$post->logo)}}" target="_blank"> {{ $post->logo }} </a>
    <br>重新上傳：{{ Form::file('logo', null, array('class' => 'form-control' )) }}
</div>
<div class="form-group">
    {!! Form::label('image', '360錄音室環境照片') !!}
    <a href="{{url('img/studio/'.$post->image)}}" target="_blank"> {{ $post->image }} </a>
    <br>重新上傳：{{ Form::file('image', null, array('class' => 'form-control' )) }}</div>
<div class="form-group">
    {{ Form::label('level', '錄音室規模') }}<br>
    {{ Form::radio('level', '彩排/大錄音室(Rehearsal / Large Studio)', array('class' => 'form-control', 'placeholder'=>'')) }}
    {{ Form::label('level', '彩排/大錄音室(Rehearsal / Large Studio)') }}<br>
    {{ Form::radio('level', '中型錄音室(Mid Studio)', array('class' => 'form-control', 'placeholder'=>'')) }}
    {{ Form::label('level', '中型錄音室(Mid Studio)') }}<br>
    {{ Form::radio('level', '個人工作室(Home Studio)', array('class' => 'form-control', 'placeholder'=>'')) }}
    {{ Form::label('level', '個人工作室(Home Studio)') }}
</div>
<div class="form-group">
    {{ Form::label('price', '所在位置') }}
	{{ Form::select('place', ['台北' => ['台北市中正區'=> '中正區',  '台北市大同區'=> '大同區',  '台北市中山區'=> '中山區',  '台北市松山區'=> '松山區',  '台北市大安區'=> '大安區',  '台北市萬華區'=> '萬華區',  '台北市信義區'=> '信義區',  '台北市士林區'=> '士林區',  '台北市北投區'=> '北投區',  '台北市內湖區'=> '內湖區',  '台北市南港區'=> '南港區',  '台北市文山區'=> '文山區'], '新北市' => ['新北市八里區'=> '八里區',  '新北市三芝區'=> '三芝區',  '新北市三重區'=> '三重區',  '新北市三峽區'=> '三峽區',  '新北市土城區'=> '土城區',  '新北市中和區'=> '中和區',  '新北市五股區'=> '五股區',  '新北市平溪區'=> '平溪區',  '新北市永和區'=> '永和區',  '新北市石門區'=> '石門區',  '新北市汐止區'=> '汐止區',  '新北市坪林區'=> '坪林區',  '新北市林口區'=> '林口區',  '新北市板橋區'=> '板橋區',  '新北市金山區'=> '金山區',  '新北市泰山區'=> '泰山區',  '新北市烏來區'=> '烏來區',  '新北市貢寮區'=> '貢寮區',  '新北市淡水區'=> '淡水區',  '新北市深坑區'=> '深坑區',  '新北市新店區'=> '新店區',  '新北市新莊區'=> '新莊區',  '新北市瑞芳區'=> '瑞芳區',  '新北市萬里區'=> '萬里區',  '新北市樹林區'=> '樹林區',  '新北市雙溪區'=> '雙溪區',  '新北市蘆洲區'=> '蘆洲區',  '新北市鶯歌區'=> '鶯歌區'] , '桃園市'=> ['桃園市中壢區'=> '中壢區']], null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('equip', '錄音設備') }}
    {{ Form::textarea('equip', null, array('class' => 'form-control', 'placeholder'=>'')) }}
</div>
<div class="form-group row">
    <div class="col-xs-2">
    {{ Form::label('style', '風格特色') }}
    {{ Form::text('style1', null, array('class' => 'form-control', 'placeholder'=>'錄音室特色風格1')) }}
    {{ Form::text('style2', null, array('class' => 'form-control', 'placeholder'=>'錄音室特色風格2')) }}
    {{ Form::text('style3', null, array('class' => 'form-control', 'placeholder'=>'錄音室特色風格3')) }}
    </div>
    <div class="col-xs-10">
    {{ Form::label('link', '相對應作品連結') }}
    {{ Form::text('link1', null, array('class' => 'form-control', 'placeholder'=>'相對應作品連結1')) }}
    {{ Form::text('link2', null, array('class' => 'form-control', 'placeholder'=>'相對應作品連結2')) }}
    {{ Form::text('link3', null, array('class' => 'form-control', 'placeholder'=>'相對應作品連結3')) }}
    </div>
  </div>

{{ Form::submit('修改', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection