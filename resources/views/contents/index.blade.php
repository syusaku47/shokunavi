@extends('layout')

  @section('content')
  
  <div class="d-flex align-items-center">
    <h1>食ナビ</h1>
    <div class="ml-auto contents__linkBox">
      <a href="{{ route('contents.create') }}" class="btn btn-outline-dark">新規作成</a>
    </div>
  </div>
        <form method="GET" action="{{ route('contents.index') }}" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
    </form>
  <!-- <table class="table table-hover contents__table">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>店舗名</th>
        <th>キャッチコピー</th>
        <th>本日おすすめ</th>
        <th></th>
        <th>更新日時</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($contents as $content)
      <tr>
        <th>{{ $content->id }}</th>
        <td>{{ $content->name }} </a></td>
        <td>{{ $content->catchcopy }} </a></td>
        <td>{{ $content->recommend }}</td>
        <td>{{ $content->updated_at }}</td>
        <td><a href="{{ route('contents.show', ['id'=>$content->id]) }}" class="text-info" >詳細を見る</a></td>
      </tr>
      @endforeach
    </tbody>
  </table> -->
  <div class="card-columns my-4">
  @foreach ($contents as $content)
    <div class="card" style="width:20rem;">
    <a href="{{ route('contents.show', ['id'=>$content->id]) }}" class="card-link">
      <img class="card-img-top" src="/images/default.jpg" alt="Card image cap">
    </a>
      <div class="card-body">
        <h5 class="card-title">{{ $content->name }}</h5>
        <h6 class="card-subtitle text-muted">{{ $content->catchcopy }}</h6>
        <p class="card-text">{{ $content->recommend }}</p>
        <a href="{{ route('contents.show', ['id'=>$content->id]) }}" class="card-link">店舗情報をもっと見る</a>
      </div>
    </div>
@endforeach
  </div>
    {{ $contents->links() }}
  @endsection