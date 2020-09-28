@extends('customer_layout')

  @section('content')
  <div class="d-flex align-items-center mt-4 mb-4">
  <div class="ml-auto boards__linkBox">
    <a href="{{ route('shops.index')}}" class="btn btn-outline-dark">一覧</a>
    <a href="{{ route('shops.edit',['shop' => $shop->id]) }}" class="btn btn-outline-dark">編集</a>
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
</div>

@include('share.food')

  <!-- 削除フォーム -->
  <form method="POST" action="{{ route('shops.destroy',['shop' => $shop->id]) }}">
  @csrf
<div class="text-right">
  <input type="submit" class="btn btn-danger" value="店舗情報削除" data-id="{{ $shop->id }}" onclick="deleteContent(this);">
</div>
  </form>
<script>

// ************************************
// 削除ボタンを押してすぐにレコードが削除されないようにjavascriptで確認メッセージを流します。
// *************************************
function deleteContent(e) {
    'use strict';
    if (confirm('本当に削除していいですか?')) {
    document.getElementById('delete_' + e.dataset.id).submit();
    }
}
</script>
@endsection