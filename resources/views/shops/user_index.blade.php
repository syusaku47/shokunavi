@extends('user_layout')

@section('content')
<div class="container">
  <div class="d-flex align-items-center mt-4">
    <h1 class="mr-auto">店舗情報一覧</h1>
    <div>
      <p>お店の名前で検索してください</p>
      <form method="GET" action="{{ route('shops.user_index') }}" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
      </form>
    </div>
  </div>
</div>
<div class="container">
  @include('share.message')
  <div class="card-deck mt-4">
    <div class="row">
      @foreach ($shops as $shop)
      <div class="col-md-6 mb-4">
        <div class="card h-100">
          <a href="{{ route('shops.user_show', ['shop'=>$shop->id]) }}" class="card-link">
            <img class="card-img-top" src="/uploads/{{ $shop->image }}" width="520" height="300">
          </a>
          <div class=" card-body">
            <h5 class="card-title">{{ $shop->name }}</h5>
            <h6 class="card-subtitle text-muted">{!! nl2br($shop->catchcopy) !!}</h6>
            <p class="card-text mt-2">おすすめ：{!! nl2br($shop->recommend) !!}</p>
            <a href="{{ route('shops.user_show', ['shop'=>$shop->id]) }}" class="card-link">店舗情報をもっと見る</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!--container-->
{{ $shops->links() }}
@endsection