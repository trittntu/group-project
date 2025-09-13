@extends('layouts.auth')

@section('title', 'Forgot Password - Group Project')

@section('auth-content')
<div class="w-full">
    <div class="mb-8">
        <h1 class="text-3xl font-semibold notion-text mb-2">Forgot password?</h1>
        <p class="notion-text-secondary">No problem. Just let us know your email address and we will email you a password reset link.</p>
    </div>

    <div class="space-y-6">
            @if (session('status'))
                <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-md">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
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
                        placeholder="Enter your email address"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full notion-primary-btn"
                >
                    Email Password Reset Link
                </button>
            </form>

            <div class="mt-6">
                <p class="notion-text-secondary">
                    Remember your password? 
                    <a href="{{ route('login') }}" class="notion-text font-medium hover:underline">
                        Sign in
                    </a>
                </p>
            </div>
    </div>
</div>
@endsection
