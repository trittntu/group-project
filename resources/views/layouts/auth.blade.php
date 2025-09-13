@extends('layouts.app')

@section('content')
<div class="min-h-screen notion-bg">
    <div class="max-w-xl w-full mx-auto px-4 py-8">
        <!-- Back to Home -->
        <div class="mb-8">
            <a href="/" class="inline-flex items-center notion-text-secondary hover:notion-text transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
        </div>

        @yield('auth-content')
    </div>
</div>
@endsection
