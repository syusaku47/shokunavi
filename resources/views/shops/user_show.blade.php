@extends('user_layout')

@section('content')
<div class="container">
  <div class='text-right mb-4'>
    <a href="{{ route('shops.user_index') }}" class="btn btn-outline-dark">店舗一覧に戻る</a>
  </div>
  <!-- お店情報 -->
  <div class="card">
    <div class="card-header">
      <h4>{{ $shop->name}}</h4>
    </div>
    <div class="card-body">
      <p class="card-text">{{ $shop->catchcopy}}</p>
    </div>
  </div>
  @include('share.like')

  @include('share.food')
</div>
@endsection