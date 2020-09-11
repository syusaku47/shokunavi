  <!-- 食べ物、ドリンク情報 -->
  <section class="py-5">
        <h2 class="mb-5">メニュー</h2>
        <div class="container">
          <ul class="nav nav-tabs ">
            <li class="nav-item"><a href="#food" class="nav-link active" data-toggle="tab">食べ物</a></li>
            <li class="nav-item"><a href="#drink" class="nav-link" data-toggle="tab">飲み物</a></li>
          </ul>
          <div class="tab-content">
            <div id="food" class="tab-pane active">
              <ul class="my-4">
                @foreach ($menus as $menu)
                  <li class="border-bottom pt-4">{{ $menu->food}}</li>
                @endforeach
              </ul>
            </div>
            <div id="drink" class="tab-pane">
              <ul class="my-4">
                @foreach ($menus as $menu)
                  <li class="border-bottom pt-4">{{ $menu->drink}}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </section>