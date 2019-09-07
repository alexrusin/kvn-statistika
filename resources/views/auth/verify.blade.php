@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="text-2xl text-gray-800 font-medium mb-2">{{ __('Verify Your Email Address') }}</div>

                <div class="text-xl">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    <div>{{ __('Before proceeding, please check your email for a verification link.') }}</div>
                    <div>{{ __('If you did not receive the email') }},
                        <a class="text-blue-500 py-4 font-normal"
                            href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection