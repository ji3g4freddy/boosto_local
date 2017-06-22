@extends('layouts.app')
@section('title','建立錄音室')
@section('content')
<h1>建立錄音室</h1>
<!-- if there are creation errors, they will show here -->
<form method="POST" enctype="multipart/form-data" action="{{ url('/posts') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="studio">錄音室名稱</label>
    <input type="text" class="form-control" name="studio" id="studio" placeholder="幫錄音室取個名字吧" required>
  </div>
    <div class="form-group">
    <label for="price">服務收費(以小時計費)</label>
    <input type="number" class="form-control" name="price" id="price" required>
  </div>
  <div class="form-group">
    <label for="Content">錄音室簡介</label>
    <textarea class="form-control" name="content" id="content" rows="5" required></textarea>
  </div>
  <div class="form-group">
    {!! Form::label('錄音室logo') !!}
    {!! Form::file('logo') !!}
  </div>
    <div class="form-group">
    {!! Form::label('360錄音室環境照片') !!}
    {!! Form::file('image') !!}
  </div>
  <label for="Level">錄音室規模</label>
  <div class="form-check">
    <label class="form-check-label">
      <input class="form-check-label" type="radio" name="level" id="Rehearsal" value="彩排/大錄音室(Rehearsal / Large Studio)"> 彩排/大錄音室(Rehearsal / Large Studio)
    </label>
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input class="form-check-label" type="radio" name="level" id="Mid" value="中型錄音室(Mid Studio)"> 中型錄音室(Mid Studio)
    </label>
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input class="form-check-label" type="radio" name="level" id="Home" value="個人工作室(Home Studio)"> 個人工作室(Home Studio)
    </label>
  </div>
    <div class="form-group">
    <label for="place">所在位置</label>
    <select class="form-control" id="place" name="place" required>
          <optgroup label="台北市">
            <option value="台北市中正區">中正區</option>
            <option value="台北市大同區">大同區</option>
            <option value="台北市中山區">中山區</option>
            <option value="台北市松山區">松山區</option>
            <option value="台北市大安區">大安區</option>
            <option value="台北市萬華區">萬華區</option>
            <option value="台北市信義區">信義區</option>
            <option value="台北市士林區">士林區</option>
            <option value="台北市北投區">北投區</option>
            <option value="台北市內湖區">內湖區</option>
            <option value="台北市南港區">南港區</option>
            <option value="台北市文山區">文山區</option>
          </optgroup>
          <optgroup label="新北市">
            <option value="新北市八里區">八里區</option>
            <option value="新北市三芝區">三芝區</option>
            <option value="新北市三重區">三重區</option>
            <option value="新北市三峽區">三峽區</option>
            <option value="新北市土城區">土城區</option>
            <option value="新北市中和區">中和區</option>
            <option value="新北市五股區">五股區</option>
            <option value="新北市平溪區">平溪區</option>
            <option value="新北市永和區">永和區</option>
            <option value="新北市石門區">石門區</option>
            <option value="新北市汐止區">汐止區</option>
            <option value="新北市坪林區">坪林區</option>
            <option value="新北市林口區">林口區</option>
            <option value="新北市板橋區">板橋區</option>
            <option value="新北市金山區">金山區</option>
            <option value="新北市泰山區">泰山區</option>
            <option value="新北市烏來區">烏來區</option>
            <option value="新北市貢寮區">貢寮區</option>
            <option value="新北市淡水區">淡水區</option>
            <option value="新北市深坑區">深坑區</option>
            <option value="新北市新店區">新店區</option>
            <option value="新北市新莊區">新莊區</option>
            <option value="新北市瑞芳區">瑞芳區</option>
            <option value="新北市萬里區">萬里區</option>
            <option value="新北市樹林區">樹林區</option>
            <option value="新北市雙溪區">雙溪區</option>
            <option value="新北市蘆洲區">蘆洲區</option>
            <option value="新北市鶯歌區">鶯歌區</option>
          </optgroup>
           <optgroup label="桃園市">
            <option value="桃園市中壢區">中壢區</option>
          </optgroup>
    </select>
  </div>
  <div class="form-group">
    <label for="Equip">錄音設備</label>
    <textarea class="form-control" name="equip" id="equip" rows="5" required></textarea>
  </div>
  
  <div class="form-group row">
    <div class="col-xs-2">
    <label for="style">錄音室風格特色</label>
    <input type="text" class="form-control" name="style1" id="style1" placeholder="#特色風格1" required>
    <input type="text" class="form-control" name="style2" id="style2" placeholder="#特色風格2(選填)">
    <input type="text" class="form-control" name="style3" id="style3" placeholder="#特色風格3(選填)">
    </div>
    <div class="col-xs-10">
    <label for="link">相對應作品連結</label>
    <input type="text" class="form-control" name="link1" id="link1" placeholder="相對應作品連結1" required>
    <input type="text" class="form-control" name="link2" id="link2" placeholder="相對應作品連結2(選填)">
    <input type="text" class="form-control" name="link3" id="link3" placeholder="相對應作品連結3(選填)">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">建立</button>
</form>
@endsection