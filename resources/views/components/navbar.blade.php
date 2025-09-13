
<!-- Main Navigation -->
<div id="navbar-container" class="sticky top-0 z-50 transition-transform duration-300">
    <nav id="main-nav" class="py-2.5 border-b notion-border notion-bg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 md:gap-0">
                <!-- Logo & Title -->
                <div class="flex items-center">
                    <div class="flex items-baseline">
                        <a href="/" class="text-xl font-semibold notion-text">Group Project</a>
                        @if(isset($partHeading))
                            <span class="text-xl font-light notion-text-secondary mx-2">|</span>
                            <span class="text-xl font-bold notion-text">{{ $partHeading }}</span>
                        @endif
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-2.5">
                    <!-- Theme Toggle -->
                    <button id="theme-btn" class="h-10 w-10 flex items-center justify-center notion-primary-btn rounded-full transition-all duration-300" title="Toggle theme">
                        <span id="theme-icon" class="w-5 h-5"></span>
                    </button>
                    @auth
                        <!-- Menu Button -->
                        <button id="offcanvas-open-btn" class="h-10 w-10 flex items-center justify-center notion-primary-btn rounded-full cursor-pointer transition-all duration-300 font-semibold text-sm" title="Open menu">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </button>
                    @else
                        <a href="{{ route('login') }}" class="notion-secondary-btn py-2 px-4 rounded-md font-medium transition-all duration-300">Login</a>
                        <a href="{{ route('register') }}" class="notion-primary-btn py-2 px-4 rounded-md font-medium transition-all duration-300">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</div>

@if(isset($subNavigation) && is_array($subNavigation))
    @php
        $mode = $subNavMode ?? 'full';
        $containerClass = $mode === 'semi' ? 'max-w-2xl' : 'max-w-6xl';
        $paddingClass = $mode === 'semi' ? 'px-4 py-4' : 'px-4 py-3';
    @endphp
    <!-- Sub Navigation Bar -->
    <div id="sub-nav" class="notion-bg border-b notion-border transition-all duration-300 subnav-{{ $mode }}">
        <div class="{{ $containerClass }} mx-auto {{ $paddingClass }}">
            <div class="flex items-center">
                <ul class="flex list-none m-0">
                    @foreach($subNavigation as $item)
                        <li class="mr-6">
                            <a href="{{ $item[1] }}" 
                               class="notion-text-secondary transition-colors duration-300 py-2 nav-link
                                      {{ request()->is(ltrim($item[1], '/')) ? 'notion-text font-bold' : '' }}">
                                {{ $item[0] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<!-- Include Offcanvas Component -->
@include('components.offcanvas')

<script src="{{ asset('js/navbar.js') }}"></script>
