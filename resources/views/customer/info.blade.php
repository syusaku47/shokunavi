@extends('customer_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">顧客情報編集</div>
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
                        <div class="col-md-8 offset-md-4">
                            <a href="{{ route('customers.edit') }}">編集する</a>
                        </div>
                    </div>
                </div>



                
            </div>
        </div>
    </div>
</div>
@endsection
