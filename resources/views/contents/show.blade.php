@extends('layout')

  @section('content')
  <div class="d-flex align-items-center mt-4 mb-4">
  <div class="ml-auto boards__linkBox">
    <a href="{{ route('contents.c_index')}}" class="btn btn-outline-dark">一覧</a>
    <a href="{{ route('contents.edit',['id' => $content->id]) }}" class="btn btn-outline-dark">編集</a>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h4>{{ $content->name}}</h4>
  </div>
  <div class="card-body">
    <p class="card-text">{{ $content->catchcopy}}</p>
    <!-- <p class="text-right font-weight-bold mr-10">作成者名</p> -->
  </div>
</div>
  <form method="POST" action="{{ route('contents.destroy',['id' => $content->id]) }}">
  @csrf
<div class="text-right">
  <input type="submit" class="btn btn-outline-denger" value="削除" data-id="{{ $content->id }}" onclick="deleteContent(this);">
</div>
  </form>


<script>
<!--
/************************************
削除ボタンを押してすぐにレコードが削除されないように
javascriptで確認メッセージを流します。
*************************************/
//-->
function deleteContent(e) {
    'use strict';
    if (confirm('本当に削除していいですか?')) {
    document.getElementById('delete_' + e.dataset.id).submit();
    }
}
</script>
@endsection