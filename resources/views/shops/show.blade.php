@extends('customer_layout')

@section('content')
<div class="container">
  <div class="d-flex align-items-center mt-4 mb-4">
    <h1>店舗情報一覧</h1>
    <div class="ml-auto">
      <a href="{{ route('shops.index')}}" class="btn btn-outline-dark">店舗一覧</a>
      <a href="{{ route('shops.edit',['shop' => $shop->id]) }}" class="btn btn-outline-dark">店舗情報編集</a>
    </div>
  </div>
</div>

<!-- お店情報 -->
<div class="container">
  <div class="card">
    <div class="card-header">
      <h4>{{ $shop->name}}</h4>
    </div>
    <div class="card-body">
      <p class="card-text">{{ $shop->catchcopy}}</p>
      <p class="card-text">{{ $shop->recommend}}</p>
    </div>
  </div>

  <div class="d-flex align-items-center my-4 ">
    <div class="ml-auto">
      <a class="btn btn-outline-dark" href="{{ route('shops.foods.edit',['shop'=>$shop->id]) }}">メニューの編集</a>
    </div>
  </div>
  @include('share.food')
  @include('share.js')
</div>
@endsection