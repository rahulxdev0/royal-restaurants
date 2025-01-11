<header class="shadow">
    <div class="container mx-auto flex items-center justify-between p-3">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            {{-- <img src="/path/to/logo.png" alt="Royal Restaurants Logo" class="h-10 w-10"> --}}
            <h2 class="text-2xl font-extrabold text-orange-400">Royal Restaurants</h2>
        </div>
        <!-- Navigation -->
        <nav class="hidden md:flex space-x-6">
            <a href="#home" class="hover:text-yellow-400">Home</a>
            <a href="#menu" class="hover:text-yellow-400">Menu</a>
            <a href="#about" class="hover:text-yellow-400">About</a>
            <a href="#contact" class="hover:text-yellow-400">Contact</a>
        </nav>
        <!-- Buttons -->
        <div class="flex items-center space-x-4">
            <a href="">Search</a>
            <a href="">Cart</a>
            <a href="#book" class="border border-orange-300 text-center text-orange-600 font-semibold px-7 py-2 rounded-full hover:bg-yellow-500">sign in</a>
            <button class="md:hidden text-yellow-400" id="menuToggle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div class="md:hidden" id="mobileMenu" style="display: none;">
        <nav class="flex flex-col space-y-2  p-4">
            <a href="#home" class="hover:text-yellow-400">Home</a>
            <a href="#menu" class="hover:text-yellow-400">Menu</a>
            <a href="#about" class="hover:text-yellow-400">About</a>
            <a href="#contact" class="hover:text-yellow-400">Contact</a>
        </nav>
    </div>
</header>
