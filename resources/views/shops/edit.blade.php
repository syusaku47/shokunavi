
@extends('customer_layout')
  @section('content')
    <div class="d-flex align-items-center mb-4">
      <h1>店舗情報編集</h1>
      <div class="ml-auto">
        <a href=" {{ route('shops.index') }} " class="btn btn-outline-dark">店舗一覧</a>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert danger p-0">
        <ul class="px-0">
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('shops.update', ['shop' => $shop->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="form-group">
          <label for="name">タイトル</label>
          <input type="text" class="form-control mb-4" name="name" id="name"
                value="{{ old('name') ?? $shop->name }}" />
        </div>

        <div class="form-group">
          <label for="catchcopy">お店紹介文</label>
          <textarea type="text" class="form-control mb-4" name="catchcopy" id="catchcopy">{{ old('catchcopy') ?? $shop->catchcopy }}</textarea>
        </div>

        <div class="form-group">
          <label for="recommend">本日のおすすめ</label>
          <textarea type="text" class="form-control mb-4" name="recommend" id="recommend">{{ old('recommend') ?? $shop->recommend }}</textarea>
        </div>
        <input type="file" name="image">

        <div class="text-right">
          <button type="submit" class="btn btn-primary">送信</button>
        </div>
    </form>
        <!-- 削除フォーム -->
        <form method="POST" action="{{ route('shops.destroy', ['shop' => $shop->id]) }}" id="form_{{ $shop->id }}">
          @csrf
          @method('DELETE')
          <div class="text-left">
            <a href="#" type="submit" class="btn btn-danger" data-id="{{ $shop->id }}" onclick="deleteContent(this)">店舗削除</a> 
          </div>
        </form>
    @include('share.js')
  @endsection