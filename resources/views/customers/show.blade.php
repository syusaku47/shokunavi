@extends('customer_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">顧客情報編集</div>

                @include('share.message')
                <div class="card-body">
                    <div class="form-info">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-right mb-4">{{ __('お名前') }}</p>
                                <p class="text-right mb-4">{{ __('メールアドレス') }} </p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-4">{{ $customer->name }}</p>
                                <p class="mb-4">{{ $customer->email }}</p>
                        <ul class="m-0 p-0">
                            <li class="mb-2">
                                <a href="{{ route('customers.edit', ['customer' => $customer->id]) }}">ユーザー情報編集はこちら</a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('customers.edit_password', ['customer' => $customer->id]) }}">パスワードの編集はこちら</a>
                            </li>
                        </ul>
                            </div>
                        </div>
                    </div>

                        <div class="col-md-10 text-right">
                    <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
