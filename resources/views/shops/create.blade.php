@extends('customer_layout')

@section('content')
<div class="d-flex align-items-center mb-4">
  <h1>店舗情報を入力してください</h1>
  <div class="ml-auto">
    <a href="{{ route('shops.index')}}" class="btn btn-outline-dark">戻る</a>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="p-0">
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="{{ route('shops.store') }}" method="POST">
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
            
          <div class="text-right">
            <button type="submit" class="btn btn-primary">送信</button>
          </div>
        </form>
  </div>
</div>
@endsection

<script>

  document.script function('click'){

  }

</script>