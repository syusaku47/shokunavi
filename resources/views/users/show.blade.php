@extends('user_layout')

@section('content')
<div class="container">
<div class="text-right">
    <a href="{{ route('shops.user_index') }}" class="btn btn-outline-dark">Topへ戻る</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        ユーザー情報一覧
                    </div>
                    <div class="ml-auto">
                        <button>設定</button>
                    </div>
                </div>

                    @if (session('update_info_success'))
                        <div class="container mt-2">
                            <div class="alert alert-success">
                                {{session('update_info_success')}}
                            </div>
                        </div>
                    @endif

                    @if (session('update_password_success'))
                        <div class="container mt-2">
                            <div class="alert alert-success">
                                {{session('update_password_success')}}
                            </div>
                        </div>
                    @endif

                <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ニックネーム') }}</label>
                            <div class="col-md-6">
                                <li class="mb-4">{{ $user->name }}</li>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }} </label>
                            <div class="col-md-6">
                                <li class="mb-4">{{ $user->email }}</li>
                            </div>
                        </div>
                    <div class="text-md-right">
                        <a  href="{{ route('users.edit',['user' => $user->id]) }}">ユーザー情報編集</a>
                    </div>
                    <div class="text-md-right">
                        <a  href="{{ route('users.edit_password',['user' => $user->id]) }}">パスワード変更はこちら</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
