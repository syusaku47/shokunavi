@extends('customer_layout')

@section('content')
<div class="d-flex align-items-center">
  <h1>店舗情報を入力してください</h1>
  <div class="ml-auto contents__linkBox">
    <a href="/index" class="btn btn-outline-dark">戻る</a>
  </div>
</div>
    <div class="row">
      <div class="col col-md-offset-3 col-md-9">
        <nav class="panel panel-default">
            <div class="panel-body">
            @if ($errors->any())
              <div class="alert alert danger">
                <ul >
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
            @endif
              <form action="{{ route('contents.create') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">店舗名称（必須）</label>
                  <input type="text" class="form-control mb-4" name="name" id="name" value="{{ old('name') }}"/>
                </div>
                <div class="form-group">
                  <label for="catchcopy">お店紹介文（必須）</label>
                  <textarea type="text" class="form-control pb-5" name="catchcopy" id="catchcopy" value="{{ old('catchcopy') }}"></textarea>
                </div>
                <div class="form-group">
                  <label for="recommend">本日のおすすめ（必須）</label>
                  <textarea type="text" class="form-control pb-5" name="recommend" id="recommend" value="{{ old('recommend') }}"></textarea>
                </div>
                  
                  @for($i=0; $i<2; $i++)
                    <div class="form my-4">
                      <div class="form-group row">
                        <label for="food_name" class="col-md-3 col-form-label">{{ __('料理名（必須）') }}</label>
                        <input type="text" class="form-control col-md-6 mr-auto" name="menu_name[]" id="food_name" value="{{ old('menu_name.$i') }}" />
                        {{Form::select('tips[]', ['選択しない','おすすめ'])}}
                      </div>
                      
                      <div class="form-group row">
                        <label for="price" class="col-md-3 col-form-label">{{ __('料金（必須）') }}</label>
                        <input type="number" class="form-control col-md-4" name="price[]" id="price" value="{{ old('price.$i') }}"/>
                        <span>円(税抜)</span>
                      </div>
                      <div class="form-group row">
                        <label for="description" class="col-md-3 col-form-label">{{ __('おすすめポイント') }}</label>
                        <textarea type="text" class="form-control col-md-9" name="description[]" id="description" value="{{ old('description.$i') }}" ></textarea>
                      </div>
                    </div>
                  @endfor
                  
                  @for($i=0; $i<2; $i++)
                    <div class="form my-4">
                      <div class="form-group row">
                        <label for="food_name" class="col-md-3 col-form-label">{{ __('ドリンク名（必須）') }}</label>
                        <input type="text" class="form-control col-md-6 mr-auto" name="menu_name[]" id="food_name" value="{{ old('menu_name.$i') }}"/>
                        {{Form::select('tips[]', ['選択しない','おすすめ'])}}
                      </div>
                      
                      <div class="form-group row">
                        <label for="price" class="col-md-3 col-form-label">{{ __('料金（必須）') }}</label>
                        <input type="number" class="form-control col-md-4" name="price[]" id="price" value="{{ old('price.$i') }}"/>
                        <span>円(税抜)</span>
                      </div>
                      <div class="form-group row">
                        <label for="description" class="col-md-3 col-form-label">{{ __('おすすめポイント') }}</label>
                        <textarea type="text" class="form-control col-md-9" name="description[]" id="description" value="{{ old('description.$i') }}"></textarea>
                      </div>
                    </div>
                  @endfor

                  @for($i=0; $i<4; $i++)<input type="hidden" name="num[]"/>@endfor
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
              </form>
            </div>
          </nav>
        </div>
      </div>
@endsection

<script>

  document.script function('click'){

  }

</script>