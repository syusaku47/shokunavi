@extends('customer_layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 m-auto">
      <div class="d-flex">
        <h1>店舗情報編集</h1>
        <div class="ml-auto">
          <a href=" {{ route('shops.index') }} " class="btn btn-outline-dark">店舗一覧</a>
        </div>
      </div>
      @include('share.error')
      <div class="bg-white p-4">
        <form action="{{ route('shops.update', ['shop' => $shop->id]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">店舗名</label>
            <input type="text" class="form-control mb-4" name="name" id="name" value="{{ old('name') ?? $shop->name }}" />
          </div>

          <!-- タグ選択 -->
          @foreach ($tags as $key => $tag)
          <div class="form-check form-check-inline">
            <!-- ここの記載方法で悩み中 -->
            <input class="form-check-input" type="checkbox" id="check_{{ $tag->id }}" name="tag[]" value="{{ $tag->id }}" {{ (is_array(old('tag')) && in_array("$tag->id", old('tag'), true))?"checked" :"" ?? if(in_array($tag->id,$tagId,true))?"checked":"" }}>
            <label class="form-check-label" for="check_{{ $tag->id }}">{{ $tag->name }}</label>
          </div>
          @endforeach

          <div class="form-group">
            <label for="catchcopy">お店紹介文</label>
            <textarea type="text" class="form-control mb-4" rows="5" name="catchcopy" id="catchcopy">{{ old('catchcopy') ?? $shop->catchcopy }}</textarea>
          </div>

          <div class="form-group">
            <label for="recommend">本日のおすすめ</label>
            <textarea type="text" class="form-control mb-4" rows="5" name="recommend" id="recommend">{{ old('recommend') ?? $shop->recommend }}</textarea>
          </div>
          <input type="file" name="image">

          <div class="text-right">
            <button type="submit" class="btn btn-primary">送信</button>
          </div>
      </div>
      </form>
      <!-- 削除フォーム -->
      <form method="POST" action="{{ route('shops.destroy', ['shop' => $shop->id]) }}" id="form_{{ $shop->id }}">
        @csrf
        @method('DELETE')
        <div class="text-right my-4">
          <a href="#" type="submit" class="" data-id="{{ $shop->id }}" onclick="deleteContent(this)">店舗削除</a>
        </div>
      </form>
    </div>
  </div>
</div>
@include('share.js')
@endsection