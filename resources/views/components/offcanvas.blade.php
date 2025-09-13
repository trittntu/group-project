<!-- Offcanvas Overlay -->
<div id="offcanvas-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-[9998] hidden transition-opacity duration-300"></div>

<!-- Offcanvas Panel -->
<div id="offcanvas-panel" class="fixed top-0 right-0 h-full w-80 notion-bg z-[9999] transform translate-x-full transition-transform duration-300 shadow-2xl">
    <div class="h-full flex flex-col">
        <!-- Header -->
        <div class="flex items-center justify-between p-4">
            <button id="close-offcanvas" class="h-10 w-10 flex items-center justify-center notion-text-secondary hover:notion-text rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="h-10 px-4 flex items-center justify-center border notion-border rounded-full text-sm font-medium notion-text notion-bg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        Logout
                    </button>
                </form>
            @endauth
        </div>

        @auth
            <!-- User Account Card -->
            <div class="p-6">
                <div class="text-center">
                    <!-- Profile Picture -->
                    <div class="w-20 h-20 mx-auto mb-4 bg-blue-500 rounded-full flex items-center justify-center text-white text-2xl font-medium">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    
                    <!-- User Info -->
                    <h2 class="text-lg font-medium notion-text mb-1">{{ Auth::user()->name }}</h2>
                    <p class="text-sm notion-text-secondary mb-4 truncate">{{ Auth::user()->email }}</p>
                    
                    <!-- Manage Account Button -->
                    <a href="{{ route('profile') }}" class="inline-flex items-center px-4 py-2 border notion-border rounded-full text-sm font-medium notion-text notion-bg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        Manage Your Account
                    </a>
                </div>
            </div>

        @endauth
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const openBtn = document.getElementById('offcanvas-open-btn');
    const closeBtn = document.getElementById('close-offcanvas');
    const overlay = document.getElementById('offcanvas-overlay');
    const panel = document.getElementById('offcanvas-panel');

    function openOffcanvas() {
        overlay.classList.remove('hidden');
        panel.classList.remove('translate-x-full');
        document.body.style.overflow = 'hidden';
        
        setTimeout(() => {
            overlay.classList.add('opacity-100');
        }, 10);
    }

    function closeOffcanvas() {
        panel.classList.add('translate-x-full');
        overlay.classList.remove('opacity-100');
        document.body.style.overflow = '';
        
        setTimeout(() => {
            overlay.classList.add('hidden');
        }, 300);
    }

    if (openBtn) {
        openBtn.addEventListener('click', openOffcanvas);
    }
    
    if (closeBtn) {
        closeBtn.addEventListener('click', closeOffcanvas);
    }
    
    if (overlay) {
        overlay.addEventListener('click', closeOffcanvas);
    }

    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeOffcanvas();
        }
    });
});
</script>