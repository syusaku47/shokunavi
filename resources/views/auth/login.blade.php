@extends('user_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2 py-4">
            <div class="card">
                <div class="card-header">一般ユーザー様ログインフォーム</div>
                <div class="card-body">
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center">
                            <h2>【採用担当者様 専用ログインフォーム】</h2>
                            <p>下記の「専用ログイン」ボタンを押していただければ、<br>
                                すぐに専用アカウントでログインが可能です。</p>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? 'saiyo@email.com' }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="saiyotantou" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('ログイン状態を保持する') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="ml-2" href="{{ route('password.request') }}">
                                    {{ __('パスワードをお忘れの方') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <!--login-form-->
                    <!-- <div id="open" class="modal">
                        詳細を見る
                    </div> -->
                    <hr class="my-4">
                    <div class="attention">
                        <h2>【重要】不正ログインによる被害を防ぐためのお願い</h2>
                        <p>不正ログインによる被害を防ぐため、他サービスで設定しているID・パスワードの使い回しはしない、推測しやすいパスワードは使用しないことをお願いいたします。</p>
                        <h2>【重要】ログイン状態の保持について</h2>
                        <p>「ログイン状態を保持する」にチェックを入れてログインした端末からは、登録されている個人情報を他人が閲覧したり、なりすまされて利用される危険性があります。第三者と共用で使用するパソコンをご利用の場合は、お客様のセキュリティ保護の観点からチェックを外してログインしてください。</p>
                    </div>

                    <!-- モーダル -->
                    <!-- <section>
                        <div id="mask" class="hidden"></div>
                        <div id="modal" class="hidden">
                            <h1>使用方法</h1>
                            <p>お好きなお店をお気に入りしてください！みんなのお気に入りのお店が一目で分かります。コメント機能も今後搭載していきますので、しばしお待ちください</p>
                            <div id="close">
                                閉じる
                            </div>
                        </div>
                    </section> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="customer-link col-md-8 offset-2 text-right">
            <a href="{{ route('customers.auth.login') }}">飲食店for ログインへ</a>
        </div>
    </div>
</div>
<!--container-->
@endsection