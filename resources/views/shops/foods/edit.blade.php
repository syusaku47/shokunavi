@extends('customer_layout')

  @section('content')

<div class="d-flex align-items-center mb-4">
  <h1>メニュー編集</h1>
  <div class="ml-auto">
    <a href=" {{ route('shops.index') }} " class="btn btn-outline-dark">店舗一覧</a>
    <a href=" {{ route('shops.foods.create',['shop' => $shop->id]) }} " class="btn btn-outline-dark">新規メニュー追加</a>
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

<form action="{{ route('shops.foods.update', ['shop' => $shop->id]) }}" method="POST" >
  @csrf

  <div class="container">
    <!-- 食べ物、ドリンク情報 -->
    <section class="py-5">
      <h2 class="mb-5">メニュー</h2>


      <div class="form my-4">
        @foreach ($foods as $food)
          <div class="form-group row">
            <label for="menu_name" class="col-md-3 col-form-label">{{ __('食べ物（必須）') }}</label>
            <input type="text" class="form-control col-md-6 mr-auto" name="menu_name[]" id="menu_name" value="{{ old('menu_name') ?? $food->name }}" />
            {{Form::select('tips[]', ['選択しない','おすすめ'])}}
          </div>
          
          <div class="form-group row">
            <label for="price" class="col-md-3 col-form-label">{{ __('料金（必須）') }}</label>
            <input type="number" class="form-control col-md-4" name="price[]" id="price" value="{{ old('price') ?? $food->price }}"/>
            <span>円(税抜)</span>
          </div>
          <div class="form-group row">
            <label for="description" class="col-md-3 col-form-label">{{ __('おすすめポイント') }}</label>
            <textarea type="text" class="form-control col-md-9" name="description[]" id="description" value="{{ old('description') ?? $food->description }}" ></textarea>
          </div>
        @endforeach
      </div>
      <div class="form my-4">
        @foreach ($drinks as $drink)
          <div class="form-group row">
            <label for="menu_name" class="col-md-3 col-form-label">{{ __('飲み物（必須）') }}</label>
            <input type="text" class="form-control col-md-6 mr-auto" name="menu_name[]" id="menu_name" value="{{ old('menu_name') ?? $drink->name }}" />
            {{Form::select('tips[]', ['選択しない','おすすめ'])}}
          </div>
          
          <div class="form-group row">
            <label for="price" class="col-md-3 col-form-label">{{ __('料金（必須）') }}</label>
            <input type="number" class="form-control col-md-4" name="price[]" id="price" value="{{ old('price') ?? $drink->price }}"/>
            <span>円(税抜)</span>
          </div>
          <div class="form-group row">
            <label for="description" class="col-md-3 col-form-label">{{ __('おすすめポイント') }}</label>
            <textarea type="text" class="form-control col-md-9" name="description[]" id="description" value="{{ old('description') ?? $drink->description }}" ></textarea>
          </div>
        @endforeach
      </div>


          @for($i=0; $i<2; $i++)<input type="hidden" name="num[]"/>@endfor
        </div>
      </div>
    </section>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">送信</button>
    </div>
  </div>
</form>

@endsection