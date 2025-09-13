<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Project</title>
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
<body class="font-sans leading-relaxed notion-text notion-bg">
    <!-- Navbar -->
    <x-navbar />

    <!-- Main Content -->
    <main class="py-10">
        <div class="max-w-6xl mx-auto px-2.5 rounded-md">
            <div class="text-left max-w-2xl py-2.5 rounded-md">
                <h1 class="text-5xl md:text-6xl font-semibold mb-4 leading-tight rounded-md notion-text">Welcome to Group Project</h1>
                <p class="text-lg notion-text-secondary mb-5 leading-relaxed rounded-md">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
                <a href="{{ route('login') }}" class="notion-primary-btn text-lg">Get Started</a>
            </div>
        </div>
    </main>
</body>
</html>
