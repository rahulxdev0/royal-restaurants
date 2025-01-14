@extends('home.layout')


@section('content')
    <!-- Hero Section -->
    <section class="w-full  mx-auto">
        <div class="pt-5 px-5">
            @if($banner)
            <img src="{{ asset('storage/' . $banner->banner_image) }}" alt="{{ $banner->banner_title }}" class=" h-60 w-full">
            
            @else
            <img src="hero.png" alt="Royal Restaurants Hero" class=" h-60 w-full">

            @endif
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="mx-auto px-10 max-w-6xl mt-5">
        <div class="w-full border-b-2 border-gray-200 pb-5">
            <h1 class="text-2xl font-bold leading-loose text-gray-600 mb-2">Explore our menu</h1>
            <div class="grid grid-cols-1 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-6">
                @foreach ($categories as $category)
                    <div class="bg-white rounded-lg">
                        <img src="{{ asset('images/' . $category->image) }}" alt="{{ $category->title }}"
                            class="rounded-t-lg h-24 w-full object-contain">
                        <div class="p-2">
                            <h3 class="text-lg font-semibold text-gray-600 text-center">{{ $category->cat_title }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="w-full max-w-6xl mx-auto px-10 py-8">
        <h2 class="text-2xl font-bold leading-loose text-gray-600 mb-2">Top Dishes For you</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($dishes as $dish)
                <div class=" bg-white rounded-lg shadow-lg overflow-hidden group">
                    <div class="relative">
                        <!-- Dish Image -->
                        <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->title }}"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">

                        <!-- Quantity Section -->
                        <div
                            class="absolute bottom-2 right-2 bg-orange-700  text-white px-2 py-2 flex items-center justify-center rounded-full">
                            <div id="quantity-container-{{ $dish->id }}">
                                <!-- Initially, only the "+" icon -->
                                <button onclick="initializeQuantity('{{ $dish->id }}')" class="flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Dish Content -->
                    <div class="p-4">
                        <!-- Title and Category -->
                        <h3 class="text-lg font-semibold text-gray-800">{{ $dish->title }}</h3>
                        {{-- <span class="text-sm text-gray-600">{{ $dish->category->cat_title }}</span> --}}

                        <!-- Description -->
                        <p class="text-gray-600 mt-2">{{ Str::limit($dish->description, 100) }}</p>

                        <!-- Pricing -->
                        <div class="flex items-center justify-between mt-4">
                            <div class="text-xl font-semibold text-red-600 line-through">${{ $dish->price }}</div>
                            <div class="text-xl font-bold text-green-600">${{ $dish->discount_price }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
