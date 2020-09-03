@extends('layout')

  @section('content')

<div class="d-flex align-items-center">
  <h1>掲示板編集</h1>
  <div class="ml-auto boards__linkBox">
    <a href=" {{ route('contents.c_index') }} " class="btn btn-outline-dark">一覧</a>
  </div>
</div>

<form action="{{ route('contents.edit', ['id' => $content->id]) }}" method="POST">
  @csrf

  <div class="form-group">
    <label for="name">タイトル</label>
    <input type="text" class="form-control" name="name" id="name"
          value="{{ old('name') ?? $content->name }}" />
  </div>

  <div class="form-group">
    <label for="due_date">内容</label>
    <textarea type="text" class="form-control" name="catchcopy" id="catchcopy"
          value="{{ old('catchcopy') ?? $content->catchcopy }}" /></textarea>
  </div>
  <div class="text-right">
    <button type="submit" class="btn btn-primary">送信</button>
  </div>
</form>

@endsection