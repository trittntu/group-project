@extends('layouts.auth')

@section('title', 'Register - Group Project')

@section('auth-content')
<div class="w-full">
    <div class="mb-8">
        <h1 class="text-3xl font-semibold notion-text mb-2">Create account</h1>
        <p class="notion-text-secondary">Join Group Project today</p>
    </div>

    <div class="space-y-6">
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium notion-text mb-1.5">Full Name</label>
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        value="{{ old('name') }}"
                        required 
                        class="notion-input"
                        placeholder="Enter your full name"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

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
                        placeholder="Create a password (min. 8 characters)"
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium notion-text mb-1.5">Confirm Password</label>
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        required 
                        class="notion-input"
                        placeholder="Confirm your password"
                    >
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full notion-primary-btn"
                >
                    Create account
                </button>
            </form>

            <div class="mt-6">
                <p class="notion-text-secondary">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="notion-text font-medium hover:underline">
                        Sign in
                    </a>
                </p>
            </div>
    </div>
</div>
@endsection
