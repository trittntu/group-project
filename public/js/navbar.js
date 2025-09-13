document.addEventListener('DOMContentLoaded', function() {
    // Seamless navbar transition - feels like one unified block
    const navbarContainer = document.getElementById('navbar-container');
    const mainNav = document.getElementById('main-nav');
    const subNav = document.getElementById('sub-nav');
    const hasSubNav = subNav !== null;
    
    if (hasSubNav) {
        let isNavHidden = false;
        let ticking = false;
        
        // Setup seamless transitions - make it feel like one block
        mainNav.style.transition = 'transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        
        // Make subnav always sticky and positioned right after main nav
        subNav.style.position = 'sticky';
        subNav.style.top = '0';
        subNav.style.zIndex = '999';
        subNav.style.pointerEvents = 'auto';
        subNav.style.userSelect = 'auto';
        
        function updateNavbar() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 20 && !isNavHidden) {
                // Any scroll down - immediately hide main nav so subnav can be sticky
                // This prevents nav from covering subnav during scroll
                mainNav.style.transform = 'translateY(-100%)';
                isNavHidden = true;
            } else if (scrollTop <= 10 && isNavHidden) {
                // Only at very top - show main nav again
                // This creates clean transition back to full navbar
                mainNav.style.transform = 'translateY(0)';
                isNavHidden = false;
            }
            
            ticking = false;
        }
        
        window.addEventListener('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(updateNavbar);
                ticking = true;
            }
        });
    }
    
    // User Dropdown functionality
    const userMenuBtn = document.getElementById('user-menu-btn');
    const userMenu = document.getElementById('user-menu');
    
    if (userMenuBtn && userMenu) {
        userMenuBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            userMenu.classList.toggle('hidden');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!userMenuBtn.contains(e.target) && !userMenu.contains(e.target)) {
                userMenu.classList.add('hidden');
            }
        });
    }
    
    // Theme toggle functionality
    const themeBtn = document.getElementById('theme-btn');
    const themeIcon = document.getElementById('theme-icon');
    const themeText = document.getElementById('theme-text');
    const body = document.body;
    
    // Theme configurations with SVG icons
    const themes = {
        light: { 
            icon: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>'
        },
        dark: { 
            icon: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>'
        },
        auto: { 
            icon: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd"></path></svg>'
        }
    };
    
    // Get saved theme or default to auto
    let currentTheme = localStorage.getItem('theme') || 'auto';
    
    // Apply theme on load
    applyTheme(currentTheme);
    
    // Theme toggle click handler
    themeBtn.addEventListener('click', function() {
        // Cycle through themes: auto -> light -> dark -> auto
        switch(currentTheme) {
            case 'auto':
                currentTheme = 'light';
                break;
            case 'light':
                currentTheme = 'dark';
                break;
            case 'dark':
                currentTheme = 'auto';
                break;
        }
        
        applyTheme(currentTheme);
        localStorage.setItem('theme', currentTheme);
    });
    
    function applyTheme(theme) {
        // Update button appearance with SVG icon
        themeIcon.innerHTML = themes[theme].icon;
        
        // Apply theme using Tailwind's dark mode
        if (theme === 'auto') {
            // Use system preference
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
    
    // Listen for system theme changes when in auto mode
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
        if (currentTheme === 'auto') {
            if (e.matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
    });
});
