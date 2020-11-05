@extends('customer_layout')

@section('content')
<div class="container">
  <div class="d-flex align-items-center mb-4">
    <h1>メニュー情報を入力してください</h1>
    <div class="ml-auto contents__linkBox">
      <a href="{{ route('shops.show',['shop'=>$shop->id]) }}" class="btn btn-outline-dark">戻る</a>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      @include('share.error')
      <form action="{{ route('shops.foods.store',['shop'=>$shop->id]) }}" method="post">
        @csrf

        <!-- フードフォーム -->
        @for ($i = 0;$i< 2;$i++) <div class="form-group row">
          <label for="food_name" class="col-md-3 col-form-label">料理名<span class="badge badge-danger">必須</span></label>
          <input type="text" class="form-control col-md-6 mr-auto" name="menu_name[]" id="food_name" value="{{ old('menu_name.$i') }}">
          {{Form::select('tips[]', ['選択しない','おすすめ'])}}
    </div>

    <div class="form-group row">
      <label for="price" class="col-md-3 col-form-label">料金<span class="badge badge-danger">必須</span></label>
      <input type="number" class="form-control col-md-4" name="price[]" id="price" value="{{ old('price.$i') }}">
      <span>円(税抜)</span>
    </div>

    <div class="form-group row">
      <label for="description" class="col-md-3 col-form-label">{{ __('おすすめポイント') }}</label>
      <textarea type="text" class="form-control col-md-9" name="description[]" id="description" value="{{ old('description.$i') }}"></textarea>
    </div>
    @endfor

    <!-- ドリンクフォーム -->
    @for ($i = 0; $i < 2; $i++) <div class="form-group row">
      <label for="food_name" class="col-md-3 col-form-label">ドリンク名<span class="badge badge-danger">必須</span></label>
      <input type="text" class="form-control col-md-6 mr-auto" name="menu_name[]" id="food_name" value="{{ old('menu_name.$i') }}">
      {{Form::select('tips[]', ['選択しない','おすすめ'])}}
  </div>

  <div class="form-group row">
    <label for="price" class="col-md-3 col-form-label">料金<span class="badge badge-danger">必須</span></label>
    <input type="number" class="form-control col-md-4" name="price[]" id="price" value="{{ old('price.$i') }}">
    <span>円(税抜)</span>
  </div>

  <div class="form-group row">
    <label for="description" class="col-md-3 col-form-label">おすすめポイント</label>
    <textarea type="text" class="form-control col-md-9" name="description[]" id="description" value="{{ old('description.$i') }}"></textarea>
  </div>
  @endfor

  @for ($i = 0; $i < 4; $i++) <input type="hidden" name="num[]">
    @endfor
    <div class="text-right">
      <button type="submit" class="btn btn-primary">送信</button>
    </div>
    </form>
</div>
</div>
</div>
@endsection