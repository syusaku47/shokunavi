@extends('layout')

  @section('content')
  <!-- <div class="top-wrapper mb-4 text-center">
    <img src="https://cdn-ak.f.st-hatena.com/images/fotolife/a/atemonaku/20180320/20180320072807.jpg" class="w-100">
  </div> -->
  <div class="d-flex align-items-center">
    <div class="ml-auto contents__linkBox">
      <a href="{{ route('contents.create') }}" class="btn btn-outline-dark">店舗新規作成</a>
    </div>
  </div>

  <div class="card-columns my-4">
  @foreach ($contents as $content)
    <div class="card" style="width:22rem;">
    <a href="{{ route('contents.show', ['id'=>$content->id]) }}" class="card-link">
    <img class="card-img-top" src="/uploads/{{ $content->image }}" width="200px" height="200px">
    </a>
      <div class="card-body">
        <h5 class="card-title">{{ $content->name }}</h5>
        <h6 class="card-subtitle text-muted">{{ $content->catchcopy }}</h6>
        <p class="card-text">おすすめ：{{ $content->recommend }}</p>
        <a href="{{ route('contents.show', ['id'=>$content->id]) }}" class="card-link">店舗情報をもっと見る</a>
      </div>
    </div>
@endforeach
  </div>
    {{ $contents->links() }}
  @endsection