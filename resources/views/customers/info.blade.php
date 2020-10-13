@extends('customer_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">顧客情報編集</div>

                @include('share.message')
                <div class="card-body">
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('お名前') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-4" name="name" value="{{ $customer->name }}" />
                        </div>
                    </div>
                    <div class="row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }} </label>
                        <div class="col-md-6">
                            <input type="email" class="form-control mb-4"  name="email" value="{{ $customer->email }}" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 offset-md-4 text-right">
                        <ul>
                            <li>
                                <a href="{{ route('customers.edit', ['customer' => $customer->id]) }}">ユーザー情報編集はこちら</a>
                            </li>
                            <li>
                                <a href="{{ route('customers.edit_password', ['customer' => $customer->id]) }}">パスワードの編集はこちら</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
