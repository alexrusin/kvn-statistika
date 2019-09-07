@extends('layouts.app')

@section('content')

<div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
    <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 bg-white sm:mx-0" style="height: 500px">
        <div class="flex flex-col w-full md:w-1/2 p-4">
            <div class="flex flex-col flex-1 justify-center mb-8">
                <h1 class="text-4xl text-center font-thin">{{ __('Login') }}</h1>
                <div class="w-full mt-4">
                    <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="flex flex-col mt-4">
                            <input id="email" type="email" class="flex-grow h-8 px-2 border rounded border-grey-400"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="{{ __('E-Mail Address') }}">
                            @error('email')
                            <div class="text-red-400 text-xs" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="flex flex-col mt-4">
                            <input id="password" type="password"
                                class="flex-grow h-8 px-2 rounded border border-grey-400" name="password" required
                                placeholder="{{ __('Password') }}" required autocomplete="current-password">
                            @error('password')
                            <div class="text-red-400 text-xs" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="flex items-center mt-4">
                            <input type="checkbox" name="remember" id="remember" class="mr-2" {{ old('remember') ? 'checked' : '' }}> <label for="remember"
                                class="text-sm text-grey-dark"> {{ __('Remember Me') }}</label>
                        </div>
                        <div class="flex flex-col mt-8">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                    @if (Route::has('password.request'))
                    <div class="text-center mt-4">
                        <a class="no-underline hover:underline text-blue-dark text-xs"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="hidden md:block md:w-1/2 rounded-r-lg"
            style="background: url('https://images.unsplash.com/flagged/photo-1553267252-d100936057c1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80'); background-size: cover; background-position: center center;">
        </div>
    </div>
</div>

@endsection