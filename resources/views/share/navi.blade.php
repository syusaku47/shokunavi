  <!-- 食べ物、ドリンク情報 -->
  <section>
    <ul class="nav nav-tabs p-0 mb-4">
      <li class="nav-item"><a href="#food" class="nav-link active" data-toggle="tab">食べ物</a></li>
      <li class="nav-item"><a href="#drink" class="nav-link" data-toggle="tab">飲み物</a></li>
      <li class="nav-item"><a href="#comment" class="nav-link" data-toggle="tab">口コミ</a></li>
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
      </div><!-- food-tab-pane -->

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
      </div><!-- drink-tab-pane -->


      <div id="comment" class="tab-pane">
        @foreach ($comments as $comment)
        <div class="row border-bottom align-items-center">
          <div class="col-md-2">
            <span class=" mb-2">{{ $comment->user->name}}</span>
          </div>

          <div class="col-md-8">
            <h4 class="mb-2">{{ $comment->title}}</h4>
            <p class="mb-2">{!! nl2br($comment->body) !!}</p>
          </div>

          <div class="col-md-2">
            @if( Auth::guard('customer')->user() )
            <!-- 削除フォーム -->
            <form method="POST" action="{{ route('shops.comments.destroy',['shop' => $shop->id, 'comment'=> $comment->id]) }}" id="form_{{ $comment->id}}">
              @csrf
              @method('DELETE')
              <a href="#" data-id="{{ $comment->id }}" type="submit" class="btn btn-danger" onclick="deleteContent(this);">削除</a><!-- this = aタグ -->
            </form>
            @endif
          </div>
        </div>
        @endforeach
        <section class="comments-form">
          @if( Auth::user() )
          <button id="comment-btn" class="my-4 btn-primary">口コミを投稿する</button>
          @include('share.error')
          <form method="POST" action="{{ route('shops.comments.store',['shop'=>$shop->id]) }}" id="comment-form">
            <div>
              <div class="form-group row">
                <label for="title" class="col-md-1 col-form-label">タイトル</label>
                <input type="text" class="form-control col-md-9" name="title" id="title" placeholder="タイトルを入れてください">
              </div>
            </div>
            <div class="form-group row">
              <label for="body" class="col-md-1 col-form-label">本文</label>
              <textarea name="body" class="form-control col-md-9" id="body" cols="30" rows="5" placeholder="口コミ本文を入れてください（500文字以内）"></textarea>
            </div>
            <button type="submit" class="offset-md-1 btn btn-primary">送信</button>
          </form>
          @endif
        </section>
      </div><!-- comment-tab-pane -->
    </div><!-- tab-content -->
  </section>