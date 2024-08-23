@extends('layouts')

@section('title', 'Confirm Password')

@section('content')
<section class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-md px-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-pink-600">Confirm Your Password</h1>

        <div class="bg-white p-8 rounded-lg shadow-lg">
            <p class="text-gray-700 mb-6">{{ __('Please confirm your password before continuing.') }}</p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-medium mb-2">{{ __('Password') }}</label>
                    <input id="password" type="password" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="text-red-600 text-sm mt-2 block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500">
                        {{ __('Confirm Password') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="text-pink-600 hover:text-pink-700 text-sm" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
