@extends('customer.layout')

@section('content')
<div class="d-flex align-items-center">
  <h1>店舗情報を入力してください</h1>
  <div class="ml-auto contents__linkBox">
    <a href="/index" class="btn btn-outline-dark">戻る</a>
  </div>
</div>
    <div class="row">
      <div class="col col-md-offset-3 col-md-10">
        <nav class="panel panel-default">
            <div class="panel-body">
            @if ($errors->any())
              <div class="alert alert danger">
                <ul >
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
            @endif
              <form action="{{ route('contents.create') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">店舗名称</label>
                  <input type="text" class="form-control mb-4" name="name" id="name" />
                  
                  <label for="catchcopy">お店紹介文</label>
                  <textarea type="text" class="form-control pb-5" name="catchcopy" id="catchcopy" /></textarea>

                  <label for="recommend">本日のおすすめ</label>
                  <textarea type="text" class="form-control pb-5" name="recommend" id="recommend" /></textarea>

                  <label for="food">食事メニュー</label>
                  @for($i=0; $i<2; $i++)
                    <input type="text" class="form-control mb-4" name="food[]" id="food" />
                  @endfor
                  
                  <label for="drink">ドリンクメニュー</label>
                  @for($i=0; $i<2; $i++)
                    <input type="text" class="form-control mb-4" name="drink[]" id="drink" />
                  @endfor

                  @for($i=0; $i<2; $i++)<input type="hidden" name="num[]"/>@endfor
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
              </form>
            </div>
          </nav>
        </div>
      </div>
@endsection

<script>

  document.script function('click'){

  }

</script>