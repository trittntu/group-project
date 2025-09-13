<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Group Project')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body class="font-sans leading-relaxed notion-text notion-bg min-h-screen">
    @if(request()->routeIs('login', 'register', 'password.request', 'password.email', 'password.reset', 'password.update'))
        @yield('content')
    @else
        @stack('navbar-data')
        @include('components.navbar', [
            'partHeading' => $partHeading ?? null,
            'subNavigation' => $subNavigation ?? null,
            'subNavMode' => $subNavMode ?? 'full'
        ])
        <main class="py-10">
            <div class="max-w-6xl mx-auto px-4">
                @yield('content')
            </div>
        </main>
    @endif

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Theme toggle functionality (if needed)
        const savedTheme = localStorage.getItem('theme') || 'auto';
        
        function applyTheme(theme) {
            if (theme === 'auto') {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (prefersDark) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } else if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
        
        applyTheme(savedTheme);
    });
    </script>
</body>
</html>
