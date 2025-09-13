@extends('layouts.app')

@section('title', 'Dashboard - Group Project')

@section('content')
@push('navbar-data')
    @php
        $partHeading = 'Dashboard';
        $subNavigation = [
            ['Overview', '/dashboard'],
            ['Analytics', '/dashboard/analytics'],
            ['Projects', '/dashboard/projects'],
            ['Settings', '/dashboard/settings']
        ];
        $subNavMode = 'full';
    @endphp
@endpush

<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-4xl font-semibold notion-text mb-2">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="notion-text-secondary">Here's what's happening with your account today.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Profile Card -->
        <div class="notion-bg border notion-border rounded-md p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold notion-text">Profile</h3>
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            <p class="notion-text-secondary text-sm mb-4">Manage your personal information</p>
            <a href="{{ route('profile') }}" class="inline-block py-2 px-4 notion-secondary-btn rounded-md text-sm font-medium transition-all duration-200">
                View Profile
            </a>
        </div>

        <!-- Security Card -->
        <div class="notion-bg border notion-border rounded-md p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold notion-text">Security</h3>
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            <p class="notion-text-secondary text-sm mb-4">Update your password and security settings</p>
            <a href="{{ route('password.change') }}" class="inline-block py-2 px-4 notion-secondary-btn rounded-md text-sm font-medium transition-all duration-200">
                Change Password
            </a>
        </div>

        <!-- Account Info Card -->
        <div class="notion-bg border notion-border rounded-md p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold notion-text">Account</h3>
                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            <p class="notion-text-secondary text-sm mb-2">Email: {{ Auth::user()->email }}</p>
            <p class="notion-text-secondary text-sm mb-4">Member since {{ Auth::user()->created_at->format('M Y') }}</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="notion-bg border notion-border rounded-md p-6 shadow-sm">
        <h3 class="text-lg font-semibold notion-text mb-4">Quick Actions</h3>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('profile') }}" class="py-2 px-4 notion-secondary-btn rounded-md text-sm font-medium transition-all duration-200">
                Edit Profile
            </a>
            <a href="{{ route('password.change') }}" class="py-2 px-4 notion-secondary-btn rounded-md text-sm font-medium transition-all duration-200">
                Change Password
            </a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded-md text-sm font-medium transition-all duration-200">
                    Sign Out
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
