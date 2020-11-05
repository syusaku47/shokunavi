@extends('customer_layout')

@section('content')
<div class="container">
  <div class="d-flex align-items-center">
    <h1>店舗情報を入力してください</h1>
    <div class="ml-auto">
      <a href="{{ route('shops.index')}}" class="btn btn-outline-dark">戻る</a>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-10 ml-4">
      @include('share.error')
      <form action="{{ route('shops.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">店舗名称 <span class="badge badge-danger">必須</span></label>
          <input type="text" class="form-control mb-4" name="name" id="name" value="{{ old('name') }}" />
        </div>
        <div class="form-group">
          <label for="catchcopy">お店紹介文<span class="badge badge-danger">必須</span></label>
          <textarea type="text" class="form-control mb-4" rows="5" name="catchcopy" id="catchcopy" value="{{ old('catchcopy') }}"></textarea>
        </div>
        <div class="form-group">
          <label for="recommend">おすすめメニュー<span class="badge badge-danger">必須</span></label>
          <textarea type="text" class="form-control" rows="5" name="recommend" id="recommend" value="{{ old('recommend') }}"></textarea>
        </div>

        <div class="text-right">
          <button type="submit" class="btn btn-primary">送信</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection