@extends('user_layout')

  @section('content')
  
  <div class="d-flex align-items-center mt-4">
    <h1 class="mr-auto">食ナビ</h1>
    
  <div>
    <p>お店の名前で検索してください</p>
    <form method="GET" action="{{ route('shops.user_index') }}" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
    </form>
  </div>
  </div>

  <div class="card-columns my-4">
  @foreach ($shops as $shop)
    <div class="card" style="width:20rem;">
    <a href="{{ route('shops.user_show', ['id'=>$shop->id]) }}" class="card-link">
    <img class="card-img-top" src="/uploads/{{ $shop->image }}" width="200px" height="200px">
    </a>
      <div class="card-body">
        <h5 class="card-title">{{ $shop->name }}</h5>
        <h6 class="card-subtitle text-muted">{{ $shop->catchcopy }}</h6>
        <p class="card-text">{{ $shop->recommend }}</p>
        <a href="{{ route('shops.user_show', ['id'=>$shop->id]) }}" class="card-link">店舗情報をもっと見る</a>
        </div>


    </div>
@endforeach
  </div>
    {{ $shops->links() }}
  @endsection