@extends('layouts.account')

@section('title', 'Profile - Group Project')

@section('account-content')
    <div class="mb-8">
        <h1 class="text-3xl font-semibold notion-text mb-2">Profile Settings</h1>
        <p class="notion-text-secondary">Manage your personal information and account details.</p>
    </div>

    @if (session('status'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
            {{ session('status') }}
        </div>
    @endif

    <div>
        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium notion-text mb-2">Full Name</label>
                <input 
                    id="name" 
                    name="name" 
                    type="text" 
                    value="{{ old('name', $user->name) }}"
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
                <label for="email" class="block text-sm font-medium notion-text mb-2">Email Address</label>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    value="{{ old('email', $user->email) }}"
                    required 
                    class="notion-input"
                    placeholder="Enter your email address"
                >
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Account Information -->
            <div class="pt-4 border-t notion-border">
                <h3 class="text-lg font-medium notion-text mb-3">Account Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium notion-text-secondary mb-1">Member Since</label>
                        <p class="notion-text">{{ $user->created_at->format('F j, Y') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium notion-text-secondary mb-1">Last Updated</label>
                        <p class="notion-text">{{ $user->updated_at->format('F j, Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4">
                <button 
                    type="submit" 
                    class="notion-primary-btn"
                >
                    Save Changes
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

    <!-- Additional Actions -->
    <div class="mt-8">
        <h3 class="text-lg font-medium notion-text mb-4">Additional Actions</h3>
        <div class="space-y-3">
            <a 
                href="{{ route('password.change') }}" 
                class="notion-secondary-btn"
            >
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                </svg>
                Change Password
            </a>
        </div>
    </div>
@endsection
