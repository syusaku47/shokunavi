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
              @foreach ($menus as $menu)
                @if( $menu->category_id == 1)
                  <div class="row border border-dark mb-4">
                    <div class="col-8">
                      <ul class="my-4">
                        <h4 class="py-2">{{ $menu->name}}
                        @if( $menu->tips == 1)
                          <span class="material-icons ml-2">thumb_up_alt</span>
                        Good!
                        @endif
                        </h4>
                        <li class="pt-4">{{ $menu->description}}</li>

                      </ul>
                    </div>
                    <div class="col-4">
                      <ul class="my-4">
                        <li class=" pt-2">{{ $menu->price}}円</li>
                        <li class=" pt-4">（税込み{{ $menu->price}}円）</li>
                      </ul>
                    </div>
                  </div>
                @endif
              @endforeach
            </div>

            <div id="drink" class="tab-pane">
              @foreach ($menus as $menu)
                  @if( $menu->category_id == 2)
                    <div class="row border border-dark mb-4">
                      <div class="col-8">
                        <ul class="my-4">
                          <h4 class="py-2">{{ $menu->name}}
                          @if( $menu->tips == 1)
                            <span class="material-icons ml-2">thumb_up_alt</span>
                          Good!
                          @endif
                          </h4>
                          <li class="pt-4">{{ $menu->description}}</li>
                        </ul>
                      </div>
                      <div class="col-4">
                        <ul class="my-4">
                          <li class=" pt-2">{{ $menu->price}}円</li>
                          <li class=" pt-4">（税込み{{ $menu->price}}円）</li>
                        </ul>
                      </div>
                    </div>
                  @endif
                @endforeach
            </div>
          </div>
        </div>
      </section>