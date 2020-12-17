@extends('customer_layout')
@section('content')

<div class="container">
  <div class="d-flex align-items-center mb-1">
    <div class="ml-auto">
      <a href="{{ route('shops.seets.create',['shop'=> $shop->id]) }}" class="btn btn-outline-dark">予約席作成</a>
    </div>
  </div>
</div>

<div class="container">
  <!-- 店舗表示 -->
  <div class="single-box  bg-white">
    <div class="table-responsive-md">
      <table class="table table-striped" style="table-layout:fixed;">
        <tr>
          <td style="width:250px;"></td>
          <th style="width:100px;">タイプ</th>
          <th style="width:100px;">席数</th>
          <th>詳細</th>
          <th style="width:85px;"></th>
          <th style="width:85px;"></th>
        </tr>
    @foreach ($seets as $seet)
        <tr>
          <td>
            @if(isset($seet->image))
            {{ $seet->image }}
            @endif
          </td>
          <td> {{ $seet->type }}</td>
          <td>{{ $seet->num_of_seets }}席</td>
          <td>{{ $seet->discription }}</td>
          <td><a href="{{route('shops.seets.edit',['shop' => $shop, 'seet' => $seet])}}" class="btn btn-primary">編集</a></td>
          <td><a href="{{route('shops.seets.destroy',['shop' => $shop, 'seet' => $seet])}}" class="btn btn-danger">削除</a></td>
        </tr>
    @endforeach
      </table>
    </div>
  </div>
</div>
@endsection