@extends('user_layout')

@section('content')
<div class="container">
  <div class='text-right mb-4'>
    <a href="{{ route('shops.user_index') }}" class="btn btn-outline-dark">店舗一覧に戻る</a>
  </div>
  @if (session('store_reservation_success'))
  <div class="container mt-2">
    <div class="alert alert-success">
      {{session('store_reservation_success')}}
    </div>
  </div>
  @endif
  <div class="row">
    <div class="col-md-8">
      <!-- お店情報 -->
      <div class="card">
        <div class="card-header">
          <h4>{{ $shop->name}}</h4>
          @foreach($tags as $tag)
          <span class="badge badge-info">{{ $tag->name }}</span>
          @endforeach
        </div>
        <div class="card-body">
          <p class="card-text">{!! nl2br($shop->catchcopy) !!}</p>
          <p class="card-text">{!! nl2br($shop->recommend) !!}</p>
        </div>
      </div>
      @include('share.like')
    </div>

    <div class="col-md-3 ml-4 p-0">
      @include('share.error')

      <div class="text-white text-center bg-secondary w-100 py-2">
        <h4 class="m-0">ネット予約</h4>
      </div>
      <!-- 予約システム -->
      <form class="border border-default p-4" action="{{ route('shops.reservations.store',['shop' => $shop]) }}" method="POST">
        @csrf

        <div class="form-group row">
          <label for="date" class="col-md-3 pr-0">来店日</label>
          <input type="text" class="form-control col-md-8" name="date" id="date" value="{{ old('date') }}">
        </div>

        <div class="form-group row">
          <label for="num_of_guests" class="col-md-3 pr-0">人数</label>
          <select name="num_of_guests" id="num_of_guests" class="col-md-8">
            @foreach(config('numbers') as $index => $num)
            <option value="{{ $index }}">{{ $num }}名</option>
            @endforeach
          </select>
        </div>

        <div class="form-group row">
          <label for="time" class="col-md-3 pr-0">時間</label>
          <select name="time" id="time" class="col-md-8">
            @foreach(config('times') as $time)
            <option value="{{ $time }}">{{ $time }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group row">
          <label for="seetId" class="col-md-3 pr-0">お席</label>
          <select name="seetId" id="seetId" class="col-md-8">
            @foreach($seets as $seet)
            <option value="{{ $seet->id }}">{{ $seet->id }}</option>
            @endforeach
          </select>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary w-100">予約する</button>
        </div>
      </form>

    </div>
  </div>
  @include('share.navi')
  @include('share.js')
</div><!-- container -->

@endsection

@section('flatpickr')
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
<script>
  flatpickr(document.getElementById('date'), {
    locale: 'ja',
    dateFormat: "Y/m/d",
    minDate: new Date()
  });
</script>
@endsection