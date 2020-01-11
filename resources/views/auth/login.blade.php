@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">
        <span class="text-3xl text-white">Sundae</span>
        <h1 class="text-white text-2xl pt-8">Welcome Back</h1>
        <h2 class="text-blue-300">Enter your credentials below:</h2>
        <form method="POST" action="{{ route('login') }}" class="pt-8">
            @csrf

            <div class="relative">
                <label for="email" class="uppercase text-blue-500 text-xs bold absolute pl-3 pt-2">E-mail</label>

                <div>
                    <input id="email" type="email" class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="your@email.com">
                    @error('email')
                        <span class="text-red-600 text-sm pl-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password" class="uppercase text-blue-500 text-xs bold absolute pl-3 pt-2">Password</label>

                <div class="">
                    <input id="password" type="password" class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700" placeholder="Password" name="password" autocomplete="current-password">

                    @error('password')
                        <span class="text-red-600 text-sm pl-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="pt-2">
                <div class="">
                    <div class="">
                        <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="text-white" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="pt-8">
                <button type="submit" class="w-full uppercase bg-gray-400 py-2 px-3 text-left rounded text-blue-800 font-bold">
                    {{ __('Login') }}
                </button>
            </div>
            <div class="flex justify-between text-sm font-bold pt-8 text-white">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
                <a class="btn btn-link" href="{{ route('register') }}">
                    Register
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
