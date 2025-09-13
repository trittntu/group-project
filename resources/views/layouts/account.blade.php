@extends('layouts.app')

@section('content')
@push('navbar-data')
    @php
        $partHeading = 'Account Settings';
        $subNavigation = [
            ['Profile', '/profile'],
            ['Change Password', '/change-password']
        ];
        $subNavMode = 'semi';
    @endphp
@endpush

<div class="max-w-2xl w-full mx-auto px-4 py-8">
    @yield('account-content')
</div>
@endsection
