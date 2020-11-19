@extends('customer_layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="d-flex align-items-center">
        <h1>メニュー編集</h1>
        <div class="ml-auto">
          <a href=" {{ route('shops.index') }} " class="btn btn-outline-dark">店舗一覧</a>
          <a href=" {{ route('shops.foods.create',['shop' => $shop->id]) }} " class="btn btn-outline-dark">新規メニュー追加</a>
        </div>
      </div>
      @include('share.error')
      <div class="bg-white p-4">
        <!-- 食べ物、ドリンク情報 -->
        @if ($foods->isEmpty() && $drinks->isEmpty())
        <div class="text-center">
          <h2>登録された商品はありません</h2>
        </div>
        @else
        <form action="{{ route('shops.foods.update', ['shop' => $shop->id]) }}" method="POST">
          @csrf
          @foreach ($foods as $food)
          <div class="form-group row">
            <label for="menu_name" class="col-md-3 col-form-label">前物 一品料理</label>
            <input type="text" class="form-control col-md-6 mr-auto" name="menu_name[]" id="menu_name" value="{{ old('menu_name.*') ?? $food->name }}" />
            {{Form::select('tips[]', ['選択しない','おすすめ'], $food->tips) }}
          </div>

          <div class="form-group row">
            <label for="price" class="col-md-3 col-form-label">料金</label>
            <input type="number" class="form-control col-md-4" name="price[]" id="price" value="{{ old('price.*') ?? $food->price }}" />
            <span>円(税抜)</span>
          </div>
          <div class="form-group row">
            <label for="description" class="col-md-3 col-form-label">おすすめポイント</label>
            <textarea type="text" class="form-control col-md-9" name="description[]" id="description">{{ old('description.*') ?? $food->description }}</textarea>
          </div>
          @endforeach
          @foreach ($drinks as $drink)
          <div class="form-group row">
            <label for="menu_name" class="col-md-3 col-form-label">飲み物</label>
            <input type="text" class="form-control col-md-6 mr-auto" name="menu_name[]" id="menu_name" value="{{ old('menu_name.*') ?? $drink->name }}" />
            {{Form::select('tips[]', ['選択しない','おすすめ'], $drink->tips)}}
          </div>

          <div class="form-group row">
            <label for="price" class="col-md-3 col-form-label">料金</label>
            <input type="number" class="form-control col-md-4" name="price[]" id="price" value="{{ old('price.*') ?? $drink->price }}" />
            <span>円(税抜)</span>
          </div>
          <div class="form-group row">
            <label for="description" class="col-md-3 col-form-label">おすすめポイント</label>
            <textarea type="text" class="form-control col-md-9" name="description[]" id="description">{{ old('description.*') ?? $drink->description }}</textarea>
          </div>
          @endforeach
          @for($i = 0;$i < 2;$i++) <input type="hidden" name="num[]">
            @endfor
            <div class="text-right">
              <button type="submit" class="btn btn-primary">送信</button>
            </div>
        </form>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection