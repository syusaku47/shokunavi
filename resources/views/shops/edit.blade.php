@extends('customer_layout')

  @section('content')

<div class="d-flex align-items-center mb-4">
  <h1>店舗情報編集</h1>
  <div class="ml-auto">
    <a href=" {{ route('shops.index') }} " class="btn btn-outline-dark">店舗一覧</a>
  </div>
</div>
@if ($errors->any())
              <div class="alert alert danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
            @endif

<form action="{{ route('shops.edit', ['shop' => $shop->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label for="name">タイトル</label>
    <input type="text" class="form-control mb-4" name="name" id="name"
          value="{{ old('name') ?? $shop->name }}" />

    <label for="catchcopy">お店紹介文</label>
    <textarea type="text" class="form-control mb-4" name="catchcopy" id="catchcopy"
      >{{ old('catchcopy') ?? $shop->catchcopy }}</textarea>

    <label for="recommend">本日のおすすめ</label>
    <textarea type="text" class="form-control mb-4" name="recommend" id="recommend">
      {{ old('recommend') ?? $shop->recommend }}</textarea>
      

      <input type="file" name="image">
        <!-- <label for="food">食事,ドリンク</label>
        <label for="drink">ドリンクメニュー</label>
        @foreach ($foods as $food)
          <input type="text" class="form-control mb-4" name="food[]" id="food" value="{{ old('food') ?? $food->food }}" />
          <input type="text" class="form-control mb-4" name="drink[]" id="drink" value="{{ old('drink') ?? $food->drink }}" />
        @endforeach -->
        
    <div class="text-right">
      <button type="submit" class="btn btn-primary">送信</button>
    </div>
</form>

@endsection