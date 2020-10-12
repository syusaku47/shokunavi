@extends('user_layout')

@section('content')
<div class="container">
<div class="text-right">
    <a href="{{ route('shops.user_index') }}" class="btn btn-outline-dark">Topへ戻る</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー情報編集</div>
                    @if ($errors->any())
                        <div class="alert alert danger">
                            <ul >
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('update_info_success'))
                        <div class="container mt-2">
                            <div class="alert alert-success">
                                {{session('update_info_success')}}
                            </div>
                        </div>
                    @endif

                    @if (session('delete_user_failed'))
                        <div class="container mt-2">
                            <div class="alert alert-success">
                                {{session('delete_user_failed')}}
                            </div>
                        </div>
                    @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('users.edit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ニックネーム') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-4" name="name" value="{{ old('name') ?? $auth->name }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }} </label>
                            <div class="col-md-6">
                                <input type="email" class="form-control"  name="email" value="{{ old('email') ?? $auth->email }}" />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('保存') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="text-md-right">
                        <a  href="{{ route('users.edit_password') }}">パスワード変更はこちら</a>
                    </div>
                </div>
                <form method="POST" id="form_{{ $auth->id }}" action="{{ route('users.destroy',['user' => $auth->id]) }}" >
                    @csrf
                        <li><a href="#" data-id="{{ $auth->id }}" type="submit" onclick="deleteContent(this);">退会したい場合はこちら</a></li>
                </form>
                @include('share.js')

            </div>
        </div>
    </div>
</div>
@endsection
