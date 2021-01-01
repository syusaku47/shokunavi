@extends('user_layout')

@section('content')
<div class="container">
    <div class="text-right">
        <a href="{{ route('shops.user_index') }}" class="btn btn-outline-dark">Topへ戻る</a>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div id="setting-float" class="close p-3 border">
                    <div class="text-md-left">
                        <a href="{{ route('users.edit',['user' => $user->id]) }}">ユーザー情報編集</a>
                    </div>
                    <div class="text-md-left">
                        <a href="{{ route('users.edit_password',['user' => $user->id]) }}">パスワード変更</a>
                    </div>
                </div>
                <div class="card-header d-flex">
                    <div>
                        ユーザー情報一覧
                    </div>
                    <div class="ml-auto">
                        <button id=btn type="button">設定</button>
                    </div>
                </div>

                @include('share.message')

                <div class="card-body">
                    <table>
                        <tbody>
                            <tr class="m-4">
                                <td style="width:50%">ニックネーム</td>
                                <td style="width:50%">{{ $user->name }}</td>
                                <td></td>
                            </tr>
                            <tr></tr>
                            <tr class="m-4">
                                <td style="width:50%">メールアドレス</td>
                                <td style="width:50%">{{ $user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <section class="py-5">
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item"><a href="#like" class="nav-link active" data-toggle="tab">いいねした店舗</a></li>
            <li class="nav-item"><a href="#reservation" class="nav-link" data-toggle="tab">予約した店舗</a></li>
        </ul>
        <div class="tab-content">
            <div id="like" class="tab-pane active">
                <div class="card-deck mt-4">
                    <div class="row">
                        @foreach ($shops as $shop)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="{{ route('shops.user_show', ['shop'=>$shop->id]) }}" class="card-link">
                                    <img class="card-img-top" src="/uploads/{{ $shop->image }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $shop->name }}</h5>
                                    <h6 class="card-subtitle text-muted">{{ $shop->catchcopy }}</h6>
                                    <p class="card-text">おすすめ：{{ $shop->recommend }}</p>
                                    <a href="{{ route('shops.user_show', ['shop'=>$shop->id]) }}" class="card-link">店舗情報をもっと見る</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="reservation" class="tab-pane">
            <div class="card-deck mt-4">
                    <div class="row">
                        @foreach ($seets as $seet)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="{{ route('shops.user_show', ['shop'=>$seet->shop->id]) }}" class="card-link">
                                    <img class="card-img-top" src="/uploads/{{ $seet->shop->image }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $seet->shop->name }}</h5>
                                    <h6 class="card-subtitle text-muted">人数：{{ $seet->num_of_seets }}</h6>
                                    <p class="card-text">お席：{{ $seet->discription }}</p>
                                    <a href="{{ route('shops.user_show', ['shop'=>$seet->shop->id]) }}" class="card-link">店舗情報をもっと見る</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    var btn = document.getElementById('btn');
    var setting = document.getElementById('setting-float');
    btn.addEventListener('click', function() {

        if (btn.innerHTML === "設定") {

            setting.classList.remove('close');
            setting.classList.add('open');
            btn.innerHTML = '閉じる';
        } else {

            setting.classList.remove('open');
            setting.classList.add('close');
            btn.innerHTML = '設定';
        }
    });
</script>
@endsection