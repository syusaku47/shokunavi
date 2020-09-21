@extends('user_layout')

  @section('content')
  <div class='text-right mb-4'>
  <a href="{{ route('contents.user_index') }}" class="btn btn-outline-dark">店舗一覧に戻る</a>
  </div>
<!-- お店情報 -->
<div class="card">
  <div class="card-header">
    <h4>{{ $content->name}}</h4>
  </div>
  <div class="card-body">
    <p class="card-text">{{ $content->catchcopy}}</p>
  </div>
</div>

@if (Auth::check())
    @if ($like)
      {{ Form::model($content, array('action' => array('LikesController@destroy', $content->id, $like->id))) }}
        <button type="submit">
          <img src="/images/like.jpeg">
          Like {{ $content->likes_count }}
        </button>
      {!! Form::close() !!}
    @else
      {{ Form::model($content, array('action' => array('LikesController@store', $content->id))) }}
        <button type="submit">
          <img src="/images/unlike.jpeg">
          Like {{ $content->likes_count }}
        </button>
      {!! Form::close() !!}
    @endif
  @endif


@include('share.menu')

@endsection