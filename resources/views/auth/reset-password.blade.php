@extends('layouts.auth')

@section('title', 'Reset Password - Group Project')

@section('auth-content')
<div class="w-full">
    <div class="mb-8">
        <h1 class="text-3xl font-semibold notion-text mb-2">Reset password</h1>
        <p class="notion-text-secondary">Enter your new password below</p>
    </div>

    <div class="space-y-6">
            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium notion-text mb-1.5">Email</label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        value="{{ old('email', request()->email) }}"
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
                    <label for="password" class="block text-sm font-medium notion-text mb-1.5">New Password</label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        class="notion-input"
                        placeholder="Enter new password (min. 8 characters)"
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium notion-text mb-1.5">Confirm New Password</label>
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        required 
                        class="notion-input"
                        placeholder="Confirm new password"
                    >
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full notion-primary-btn"
                >
                    Reset Password
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
