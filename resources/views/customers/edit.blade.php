@extends('customer_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー情報編集</div>
                @include('share.error')

                <div class="card-body">
                    <form method="POST" action="{{ route('customers.edit', ['customer' => $customer->id]) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ニックネーム') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-4" name="name" value="{{ old('name') ?? $customer->name }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }} </label>
                            <div class="col-md-6">
                                <input type="email" class="form-control mb-4"  name="email" value="{{ old('email') ?? $customer->email }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('保存') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('customers.destroy',['customer' => $customer->id]) }}" id="form_{{ $customer->id }}">
                        @csrf
                        @method('POST')
                            <li>
                                <a href="#" data-id="{{ $customer->id }}" type="submit" onclick="deleteContent(this);">退会したい場合はこちら</a>
                            </li>
                    </form>
                    @include('share.js')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
