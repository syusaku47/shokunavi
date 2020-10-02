@extends('customer_layout')

  @section('content')
  <div class="d-flex align-items-center mt-4 mb-4">
  <h1>店舗情報一覧</h1>
    <div class="ml-auto">
      <a href="{{ route('shops.index')}}" class="btn btn-outline-dark">店舗一覧</a>
      <a href="{{ route('shops.edit',['shop' => $shop->id]) }}" class="btn btn-outline-dark">店舗情報編集</a>
    </div>
  </div>

  <!-- お店情報 -->
  <div class="card">
    <div class="card-header">
      <h4>{{ $shop->name}}</h4>
    </div>
    <div class="card-body">
      <p class="card-text">{{ $shop->catchcopy}}</p>
      <p class="card-text">{{ $shop->recommend}}</p>
    </div>
    <!-- 削除フォーム -->
    <form method="POST" action="{{ route('shops.destroy',['shop' => $shop->id]) }}">
      @csrf
      @method('DELETE')
      <div class="text-right">
        <input type="submit" class="btn btn-danger" value="店舗情報削除" data-id="{{ $shop->id }}" onclick="deleteContent(this);">
      </div>
    </form>
  </div>

  <div class="d-flex align-items-center mt-4 mb-4">
    <h2 class="mb-5">メニュー</h2>
      <div class="ml-auto">
        <a class="btn btn-outline-dark" href="{{ route('shops.foods.edit',['shop'=>$shop->id]) }}">メニューの編集</a>
      </div>
  </div>
  @include('share.food')
  @include('share.js')
  @endsection