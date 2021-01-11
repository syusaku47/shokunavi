@extends('customer_layout')
@section('content')
<div class="container">
  <div class="d-flex align-items-center">
    <h1>席情報を入力してください</h1>
    <div class="ml-auto">
      <a href="{{ route('shops.seets.index',['shop' => $shop])}}" class="btn btn-outline-dark">戻る</a>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-10 ml-4">
      @include('share.error')
      <form action="{{ route('shops.seets.store',['shop' => $shop]) }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="num_of_seets">席数<span class="badge badge-danger">必須</span></label>
          <input type="number" class="form-control mb-4" name="num_of_seets" id="num_of_seets" value="{{ old('num_of_seets') ?? $seet->num_of_seets }}" />
        </div>
        <div class="form-group">
          <label for="type">席タイプ<span class="badge badge-danger">必須</span></label>
          <select name="type" id="type">
            @foreach($types as $key => $type)
            <option value="{{ $key }}">{{ $type }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="discription">詳細<span class="badge badge-danger">必須</span></label>
          <textarea type="text" class="form-control mb-4" rows="5" name="discription" id="discription" value="{{ old('discription') ?? $seet->discription }}"></textarea>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-primary">送信</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection