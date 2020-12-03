@extends('customer_layout')

@section('content')
<!-- <div class="top-wrapper mb-4 text-center">
    <img src="https://cdn-ak.f.st-hatena.com/images/fotolife/a/atemonaku/20180320/20180320072807.jpg" class="w-100">
  </div> -->
<div class="container">
  <div class="d-flex align-items-center mb-1">
    <div class="ml-auto">
      <a href="{{ route('shops.create') }}" class="btn btn-outline-dark">店舗新規作成</a>
    </div>
  </div>
</div>

<div class="container">
  <!-- 店舗表示 -->
  <div class="tags py-2 bg-warning">
    タグで絞り込む
    @foreach($tags as $tag)
    <span class="badge badge-info">{{ $tag->name }}</span>
    @endforeach
  </div>
  <div class="single-box  bg-white">
    <div class="card-deck mt-3">
      <div class="row">
        @foreach ($shops as $shop)
        <div class="col-md-6 mb-4">
          <div class="card h-100" style="width:33rem;">
            <a href="{{ route('shops.show', ['shop'=>$shop->id]) }}" class="card-link">
              <img class="card-img-top" src="/uploads/{{ $shop->image }}" width=520" height="300">
            </a>
            <div class=" card-body">
              <h5 class="card-title">{{ $shop->name }}</h5>
              <h6 class="card-subtitle text-muted">{!! nl2br($shop->catchcopy) !!}</h6>
              <p class="card-text mt-2">おすすめ：{!! nl2br($shop->recommend) !!}</p>
              <a href="{{ route('shops.show', ['shop'=>$shop->id]) }}" class="card-link">店舗情報をもっと見る</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- /店舗表示 -->
  {{ $shops->links() }}
</div>
@endsection