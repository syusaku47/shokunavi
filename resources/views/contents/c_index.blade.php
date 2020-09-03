@extends('layout')

  @section('content')
  
  <div class="d-flex align-items-center">
    <h1>掲示板一覧</h1>
    <div class="ml-auto contents__linkBox">
      <a href="{{ route('contents.create') }}" class="btn btn-outline-dark">新規作成</a>
    </div>
  </div>
  <table class="table table-hover contents__table">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>タイトル</th>
        <th>内容</th>
        <th>作成日時</th>
        <th>更新日時</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($contents as $content)
      <tr>
        <th>{{$content->id}}</th>
        <td>{{$content->name}} </a></td>
        <td>{{$content->catchcopy}} </a></td>
        <td></td>
        <td><a href="{{ route('contents.show', ['id'=>$content->id]) }}" class="text-info" >詳細を見る</a></td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection