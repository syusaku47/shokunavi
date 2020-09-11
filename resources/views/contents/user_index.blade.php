@extends('layout')

  @section('content')
  
  <div class="d-flex align-items-center mt-4">
    <h1 class="mr-auto">食ナビ</h1>
    
  <div>
    <p>お店の名前で検索してください</p>
    <form method="GET" action="{{ route('contents.user_index') }}" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
    </form>
  </div>
  </div>

  <div class="card-columns my-4">
  @foreach ($contents as $content)
    <div class="card" style="width:20rem;">
    <a href="{{ route('contents.user_show', ['id'=>$content->id]) }}" class="card-link">
    <img class="card-img-top" src="/uploads/{{ $content->image }}" width="200px" height="200px">
    </a>
      <div class="card-body">
        <h5 class="card-title">{{ $content->name }}</h5>
        <h6 class="card-subtitle text-muted">{{ $content->catchcopy }}</h6>
        <p class="card-text">{{ $content->recommend }}</p>
        <a href="{{ route('contents.user_show', ['id'=>$content->id]) }}" class="card-link">店舗情報をもっと見る</a>
        </div>


    </div>
@endforeach
  </div>
    {{ $contents->links() }}
  @endsection