@extends('layouts.auth')

@section('title', 'Verify Email - Group Project')

@section('auth-content')
<div class="w-full">
    <div class="mb-8">
        <h1 class="text-3xl font-semibold notion-text mb-2">Verify Your Email</h1>
        <p class="notion-text-secondary">Check your email for the verification link we just sent</p>
    </div>
    
    <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 text-yellow-800 rounded-md">
        <div class="flex">
            <svg class="w-5 h-5 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
            <div>
                <p class="font-medium">Email verification required</p>
                <p class="text-sm">You cannot access the dashboard or account features until your email is verified.</p>
            </div>
        </div>
    </div>

    @if (session('status'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
            {{ session('status') }}
        </div>
    @endif

    @if (session('message'))
        <div class="mb-6 p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <div class="notion-bg border notion-border rounded-md p-6 mb-6">
        <div class="text-center">
            <div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold notion-text mb-2">Check Your Email</h3>
            <p class="notion-text-secondary mb-4">
                We sent a verification link to <strong>{{ auth()->user()->email }}</strong>
            </p>
            <p class="text-sm notion-text-secondary mb-6">
                Click the link in the email to verify your account. If you don't see the email, check your spam folder.
            </p>
        </div>
    </div>

    <div class="space-y-4">
        <!-- Resend verification email -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="w-full notion-primary-btn">
                Send Email Again
            </button>
        </form>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full notion-secondary-btn">
                Sign Out
            </button>
        </form>
    </div>

    <div class="mt-6 text-center">
        <p class="text-sm notion-text-secondary">
            Already verified? 
            <a href="{{ route('dashboard') }}" class="notion-text font-medium hover:underline">
                Go to Dashboard
            </a>
        </p>
    </div>
</div>
@endsection
