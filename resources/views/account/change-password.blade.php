@extends('layouts.account')

@section('title', 'Change Password - Group Project')

@section('account-content')
<div class="mb-8">
    <h1 class="text-3xl font-semibold notion-text mb-2">Change Password</h1>
    <p class="notion-text-secondary">Update your password to keep your account secure.</p>
</div>

@if (session('status'))
    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
        {{ session('status') }}
    </div>
@endif

<div>
    <form method="POST" action="{{ route('password.change.update') }}" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Current Password -->
        <div>
            <label for="current_password" class="block text-sm font-medium notion-text mb-2">Current Password</label>
            <input 
                id="current_password" 
                name="current_password" 
                type="password" 
                required 
                class="notion-input"
                placeholder="Enter your current password"
            >
            @error('current_password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- New Password -->
        <div>
            <label for="password" class="block text-sm font-medium notion-text mb-2">New Password</label>
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
            <p class="mt-1 text-sm notion-text-secondary">
                Password must be at least 8 characters long.
            </p>
        </div>

        <!-- Confirm New Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium notion-text mb-2">Confirm New Password</label>
            <input 
                id="password_confirmation" 
                name="password_confirmation" 
                type="password" 
                required 
                class="notion-input"
                placeholder="Confirm your new password"
            >
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-3 pt-4">
            <button 
                type="submit" 
                class="notion-primary-btn"
            >
                Update Password
            </button>
            <a 
                href="{{ route('dashboard') }}" 
                class="notion-secondary-btn"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
