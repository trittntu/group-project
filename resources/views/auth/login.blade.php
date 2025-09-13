@extends('layouts.auth')

@section('title', 'Login - Group Project')

@section('auth-content')
<div class="w-full">
    <div class="mb-8">
        <h1 class="text-3xl font-semibold notion-text mb-2">Welcome back</h1>
        <p class="notion-text-secondary">Sign in to your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium notion-text mb-1.5">Email</label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        value="{{ old('email') }}"
                        required 
                        class="notion-input"
                        placeholder="Enter your email"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium notion-text mb-1.5">Password</label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        class="notion-input"
                        placeholder="Enter your password"
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input 
                            type="checkbox" 
                            name="remember" 
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        >
                        <span class="ml-2 text-sm notion-text-secondary">Remember me</span>
                    </label>
                    
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-500">
                        Forgot password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full notion-primary-btn"
                >
                    Sign in
                </button>
            </form>

            <div class="mt-6">
                <p class="notion-text-secondary">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="notion-text font-medium hover:underline">
                        Sign up
                    </a>
                </p>
            </div>

            <div class="mt-4">
                <a href="{{ route('password.request') }}" class="text-sm notion-text-secondary hover:notion-text">
                    Forgot your password?
                </a>
            </div>
    </div>
</div>
@endsection
