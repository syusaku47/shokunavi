@extends('layout')

  @section('content')

<div class="d-flex align-items-center">
  <h1>掲示板編集</h1>
  <div class="ml-auto boards__linkBox">
    <a href=" {{ route('contents.c_index') }} " class="btn btn-outline-dark">一覧</a>
  </div>
</div>
@if ($errors->any())
              <div class="alert alert danger">
                <ul >
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
            @endif

<form action="{{ route('contents.edit', ['id' => $content->id]) }}" method="POST">
  @csrf

  <div class="form-group">
    <label for="name">タイトル</label>
    <input type="text" class="form-control" name="name" id="name"
          value="{{ old('name') ?? $content->name }}" />

    <label for="catchcopy">お店紹介文</label>
    <textarea type="text" class="form-control" name="catchcopy" id="catchcopy"
      >{{ old('catchcopy') ?? $content->catchcopy }}</textarea>

    <label for="recommend">本日のおすすめ</label>
    <textarea type="text" class="form-control" name="recommend" id="recommend">
      {{ old('recommend') ?? $content->recommend }}</textarea>
      
        <label for="food">食事メニュー</label>
        <label for="drink">ドリンクメニュー</label>
        @foreach ($menus as $menu)
          <input type="text" class="form-control mb-4" name="food[]" id="food" value="{{ old('food') ?? $menu->food }}" />
          <input type="text" class="form-control mb-4" name="drink[]" id="drink" value="{{ old('drink') ?? $menu->drink }}" />
        @endforeach

        @for($i=0; $i<2; $i++)<input type="hidden" name="num[]"/>@endfor

  </div>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">送信</button>
    </div>
</form>

@endsection