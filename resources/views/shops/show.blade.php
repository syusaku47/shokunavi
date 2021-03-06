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
      @foreach($tags as $tag)
      <span class="badge badge-info">{{ $tag->name }}</span>
      @endforeach
    </div>
    <div class="card-body">
      <p class="card-text">{!! nl2br($shop->catchcopy) !!}</p>
      <p class="card-text">{!! nl2br($shop->recommend) !!}</p>
    </div>
  </div>

  <div class="d-flex align-items-center my-4 ">
    <div class="ml-auto">
      <a class="btn btn-outline-dark" href="{{ route('shops.seets.index',['shop'=>$shop->id]) }}">席の編集</a>
      <a class="btn btn-outline-dark" href="{{ route('shops.foods.edit',['shop'=>$shop->id]) }}">メニューの編集</a>
    </div>
  </div>
  @include('share.navi')
  @include('share.js')
</div>
@endsection