  <!-- 食べ物、ドリンク情報 -->
  <section>
    <ul class="nav nav-tabs p-0 mb-4">
      <li class="nav-item"><a href="#food" class="nav-link active" data-toggle="tab">食べ物</a></li>
      <li class="nav-item"><a href="#drink" class="nav-link" data-toggle="tab">飲み物</a></li>
    </ul>
    <div class="tab-content">
      <div id="food" class="tab-pane active">
        @foreach ($foods as $food)
        <div class="row border-bottom align-items-center">
          <div class="col-md-8">
            <h4 class="mb-2">{{ $food->name}}
              @if( $food->tips == 1)
              <span class="material-icons ml-2">thumb_up_alt</span>
              <span class="good badge badge-danger">おすすめ</span>
              @endif
            </h4>
            <ul>
              <li class="mb-2">{{ $food->description}}</li>
            </ul>
          </div>
          <div class="col-md-2">
            <ul>
              <li class="mb-2">{{ $food->price}}円(税抜)</li>
              <li class="mb-2">{{ $food->getTax()}}円(税込)</li>
            </ul>
          </div>
          <div class="col-md-2">
            @if( Auth::guard('customer')->user() )
            <!-- 削除フォーム -->
            <form method="POST" id="form_{{ $food->id }}" action="{{ route('shops.foods.destroy',['shop' => $shop->id, 'food'=> $food->id]) }}">
              @csrf
              @method('DELETE')
              <a href="#" data-id="{{ $food->id }}" type="submit" class="btn btn-danger" onclick="deleteContent(this);">削除</a>
            </form>
            @endif
          </div>
        </div>

        @endforeach
      </div>

      <div id="drink" class="tab-pane">
        @foreach ($drinks as $drink)
        <div class="row border-bottom align-items-center">
          <div class="col-md-8">
            <h4 class="mb-2">{{ $drink->name}}
              @if( $drink->tips == 1)
              <span class="material-icons ml-2">thumb_up_alt</span>
              <span class="good badge badge-danger">おすすめ</span>
              @endif
            </h4>
            <ul>
              <li class="mb-2">{{ $drink->description}}</li>
            </ul>
          </div>

          <div class="col-md-2">
            <ul>
              <li class=" mb-2">{{ $drink->price}}円(税抜)</li>
              <li class=" mb-2">{{ $drink->getTax()}}円(税込)</li>
            </ul>
          </div>
          <div class="col-md-2">
            @if( Auth::guard('customer')->user() )
            <!-- 削除フォーム -->
            <form method="POST" action="{{ route('shops.foods.destroy',['shop' => $shop->id, 'food'=> $drink->id]) }}">
              @csrf
              @method('DELETE')
              <a href="#" data-id="{{ $drink->id }}" type="submit" class="btn btn-danger" onclick="deleteContent(this);">削除</a>
            </form>
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>