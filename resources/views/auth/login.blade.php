@extends('layouts')

@section('title', 'Login')

@section('content')
<section class="bg-gray-100 py-12">
    <div class="container mx-auto max-w-md px-4">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCdDcncQwAMNGSVP7hx1XnddM05ZB892g5YA&s" alt="Company Logo" class="mx-auto mb-5 h-25">
        <h1 class="text-3xl font-bold mb-6 text-center text-pink-600">Login</h1>

        <div class="bg-white p-8 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-medium mb-2">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                    @error('email')
                        <span class="text-red-600 text-sm mt-2 block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-medium mb-2">{{ __('Password') }}</label>
                    <input id="password" type="password" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                    
                    @error('password')
                        <span class="text-red-600 text-sm mt-2 block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex items-center mb-6">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="ml-2 text-gray-700" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="text-pink-600 hover:text-pink-700" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                            
                        </a>
                    @endif
                    </button>
                    <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400" onclick="window.location.href='{{ url('/') }}'">
                        Cancel
                    </button>
                </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
