@extends('user_layout')

  @section('content')
  <div class='text-right mb-4'>
  <a href="{{ route('shops.user_index') }}" class="btn btn-outline-dark">店舗一覧に戻る</a>
  </div>
<!-- お店情報 -->
<div class="card">
  <div class="card-header">
    <h4>{{ $shop->name}}</h4>
  </div>
  <div class="card-body">
    <p class="card-text">{{ $shop->catchcopy}}</p>
  </div>
</div>

@if (Auth::check())
    @if ($like)
      {{ Form::model($shop, array('action' => array('LikesController@destroy', $shop->id, $like->id))) }}
        <button type="submit">
          <img src="/images/like.jpeg">
          Like {{ $shop->likes_count }}
        </button>
      {!! Form::close() !!}
    @else
      {{ Form::model($shop, array('action' => array('LikesController@store', $shop->id))) }}
        <button type="submit">
          <img src="/images/unlike.jpeg">
          Like {{ $shop->likes_count }}
        </button>
      {!! Form::close() !!}
    @endif
  @endif


@include('share.food')

@endsection