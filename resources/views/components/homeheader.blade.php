@vite(['resources/css/app.css', 'resources/js/app.js'])

<body class="bg-gray-100 text-gray-800 font-sans">
    <!-- Navigation -->
    <header class="bg-gray-800 text-white">
        <div class="container mx-auto flex justify-between items-center p-4">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="{{ asset('images/Logo.png') }}" alt="logo" class="w-12">
                <span class="ml-4 text-lg font-bold">{{ $slot }}</span>
            </div>

            <!-- Hamburger Icon for Mobile -->
            <div class="block sm:hidden">
                <button id="hamburger" class="focus:outline-none">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Links for Desktop -->
            <nav class="hidden sm:flex space-x-6">
                <a href="{{ route('welcome') }}" class="hover:underline text-lg font-medium">Home</a>
                <a href="{{ route('articles') }}" class="hover:underline text-lg font-medium">Articles</a>
                <a href="{{ route('galleries') }}" class="hover:underline text-lg font-medium">Gallery</a>

                @auth
                    <!-- Dropdown for Profile -->
                    <div class="relative">
                        <button class="inline-flex items-center text-white hover:underline focus:outline-none">
                            {{ Auth::user()->name }}
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-white text-black rounded-md shadow-lg hidden" id="dropdown">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Log Out</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="hover:underline text-lg font-medium">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hover:underline text-lg font-medium">Register</a>
                    @endif
                @endauth
            </nav>
        </div>

        <!-- Mobile Menu -->
        <div class="hidden sm:hidden" id="mobile-menu">
            <a href="{{ route('welcome') }}" class="block px-4 py-2 text-white hover:bg-gray-700">Home</a>
            <a href="{{ route('articles') }}" class="block px-4 py-2 text-white hover:bg-gray-700">Articles</a>
            <a href="{{ route('galleries') }}" class="block px-4 py-2 text-white hover:bg-gray-700">Gallery</a>

            @auth
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-white hover:bg-gray-700">Profile</a>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-white hover:bg-gray-700">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="block w-full text-left px-4 py-2 text-white hover:bg-gray-700">Log Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-4 py-2 text-white hover:bg-gray-700">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-white hover:bg-gray-700">Register</a>
                @endif
            @endauth
        </div>
    </header>

    <!-- Main Content -->
    <!-- JavaScript for Dropdown and Hamburger -->
    <script>
        // Toggle Mobile Menu
        document.getElementById('hamburger').addEventListener('click', function () {
            var mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Toggle Dropdown
        document.querySelector('.relative button').addEventListener('click', function () {
            var dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        });
    </script>
</body>
