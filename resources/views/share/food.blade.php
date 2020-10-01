  <!-- 食べ物、ドリンク情報 -->
  <section class="py-5">
        <h2 class="mb-5">メニュー</h2>
        <div class="container">
          <ul class="nav nav-tabs mb-4">
            <li class="nav-item"><a href="#food" class="nav-link active" data-toggle="tab">食べ物</a></li>
            <li class="nav-item"><a href="#drink" class="nav-link" data-toggle="tab">飲み物</a></li>
          </ul>
          <div class="tab-content">
            <div id="food" class="tab-pane active">
              @foreach ($foods as $food)
                  <div class="row border border-dark mb-4">
                    <div class="col-6">
                      <ul class="my-4">
                        <h4 class="py-2">{{ $food->name}}
                        @if( $food->tips == 1)
                          <span class="material-icons ml-2">thumb_up_alt</span>
                        Good!
                        @endif
                        </h4>
                        <li class="pt-4">{{ $food->description}}</li>
                      </ul>
                    </div>
                    <div class="col-3">
                      <ul class="my-4">
                        <li class=" pt-2">{{ $food->price}}円</li>
                        <li class=" pt-4">（税込み{{ $food->price}}円）</li>
                      </ul>
                    </div>
                      <div class="col-3">
                        <!-- 削除フォーム -->
                        <form method="POST" action="{{ route('shops.foods.destroy',['shop' => $shop->id, 'food'=> $food->id]) }}">
                        @csrf
                        @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="フード削除" data-id="{{ $food->id }}" onclick="deleteContent(this);">
                        </form>
                      </div>
                  </div>
              @endforeach
            </div>

            <div id="drink" class="tab-pane">
              @foreach ($drinks as $drink)
                    <div class="row border border-dark mb-4">
                      <div class="col-6">
                        <ul class="my-4">
                          <h4 class="py-2">{{ $drink->name}}
                          @if( $drink->tips == 1)
                            <span class="material-icons ml-2">thumb_up_alt</span>
                          Good!
                          @endif
                          </h4>
                          <li class="pt-4">{{ $drink->description}}</li>
                        </ul>
                      </div>
                      <div class="col-3">
                        <ul class="my-4">
                          <li class=" pt-2">{{ $drink->price}}円</li>
                          <li class=" pt-4">（税込み{{ $drink->price}}円）</li>
                        </ul>
                      </div>
                      <div class="col-3">
                        <!-- 削除フォーム -->
                        <form method="POST" action="{{ route('shops.foods.destroy',['shop' => $shop->id, 'food'=> $drink->id]) }}">
                        @csrf
                        @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="ドリンク削除" data-id="{{ $drink->id }}" onclick="deleteContent(this);">
                        </form>
                      </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </section>