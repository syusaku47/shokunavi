@extends('customer_layout')

  @section('content')
  <!-- <div class="top-wrapper mb-4 text-center">
    <img src="https://cdn-ak.f.st-hatena.com/images/fotolife/a/atemonaku/20180320/20180320072807.jpg" class="w-100">
  </div> -->
  <div class="d-flex align-items-center">
    <div class="ml-auto contents__linkBox">
      <a href="{{ route('shops.create') }}" class="btn btn-outline-dark">店舗新規作成</a>
    </div>
  </div>

  <div class="card-deck mt-4">
    <div class="row">
      @foreach ($shops as $shop)
        <div class="col-md-6 mb-4">
          <div class="card h-100">
            <a href="{{ route('shops.show', ['shop'=>$shop->id]) }}" class="card-link">
              <img class="card-img-top" src="/uploads/{{ $shop->image }}">
            </a>
            <div class="card-body">
              <h5 class="card-title">{{ $shop->name }}</h5>
              <h6 class="card-subtitle text-muted">{{ $shop->catchcopy }}</h6>
              <p class="card-text">おすすめ：{{ $shop->recommend }}</p>
              <a href="{{ route('shops.show', ['shop'=>$shop->id]) }}" class="card-link">店舗情報をもっと見る</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
    {{ $shops->links() }}
  @endsection