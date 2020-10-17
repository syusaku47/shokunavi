@extends('customer_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー情報編集</div>
                @include('share.error')

                <div class="card-body">
                    <form method="POST" action="{{ route('customers.edit_password', ['customer' => $customer->id]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="current" class="col-md-4 col-form-label text-md-right">{{ __('現在のパスワード') }}</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="current-password" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('新しいのパスワード') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control"  name="new-password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirm" class="col-md-4 col-form-label text-md-right">{{ __('新しいのパスワード(確認)') }}</label>
                            <div class="col-md-6">
                                <input id="confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 text-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('保存') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
