@extends('customer.layout')

  @section('content')

<div class="d-flex align-items-center mb-4">
  <h1>店舗情報編集</h1>
  <div class="ml-auto">
    <a href=" {{ route('contents.index') }} " class="btn btn-outline-dark">店舗一覧</a>
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

<form action="{{ route('contents.edit', ['id' => $content->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label for="name">タイトル</label>
    <input type="text" class="form-control mb-4" name="name" id="name"
          value="{{ old('name') ?? $content->name }}" />

    <label for="catchcopy">お店紹介文</label>
    <textarea type="text" class="form-control mb-4" name="catchcopy" id="catchcopy"
      >{{ old('catchcopy') ?? $content->catchcopy }}</textarea>

    <label for="recommend">本日のおすすめ</label>
    <textarea type="text" class="form-control mb-4" name="recommend" id="recommend">
      {{ old('recommend') ?? $content->recommend }}</textarea>
      

      <input type="file" name="image">
        <!-- <label for="food">食事,ドリンク</label>
        <label for="drink">ドリンクメニュー</label>
        @foreach ($menus as $menu)
          <input type="text" class="form-control mb-4" name="food[]" id="food" value="{{ old('food') ?? $menu->food }}" />
          <input type="text" class="form-control mb-4" name="drink[]" id="drink" value="{{ old('drink') ?? $menu->drink }}" />
        @endforeach -->
        <!-- 食べ物、ドリンク情報 -->
        <section class="py-5">
          <h2 class="mb-5">メニュー</h2>
            <ul class="nav nav-tabs ">
              <li class="nav-item"><a href="#food-edit" class="nav-link active" data-toggle="tab">食べ物</a></li>
              <li class="nav-item"><a href="#drink-edit" class="nav-link" data-toggle="tab">飲み物</a></li>
            </ul>
            <div class="tab-content">
              <div id="food-edit" class="tab-pane active">
                <ul class="my-4">
                  @foreach ($menus as $menu)
                  <input type="text" class="form-control mb-4" name="food[]" id="food" value="{{ old('food') ?? $menu->food }}" />
                  @endforeach
                </ul>
              </div>
              <div id="drink-edit" class="tab-pane">
                <ul class="my-4">
                  @foreach ($menus as $menu)
                  <input type="text" class="form-control mb-4" name="drink[]" id="drink" value="{{ old('drink') ?? $menu->drink }}" />
                  @endforeach
                </ul>
              </div>
              @for($i=0; $i<2; $i++)<input type="hidden" name="num[]"/>@endfor
            </div>
          </div>
        </section>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">送信</button>
    </div>
</form>

@endsection