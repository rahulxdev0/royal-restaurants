@extends('admin.adminBase')

@section('content')
    <div class="max-w-4xl mx-auto p-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Product</h2>
        <form action="{{ route("admin.product.store") }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            <!-- CSRF Token -->
            @csrf

            <!-- Product Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Product Title</label>
                <input type="text" name="title" id="title"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500 "
                    placeholder="Enter product title" value="{{ old('title') }}" required />
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category Selection -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id" id="category"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
                    required>
                    <option>Select a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->cat_title }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Product Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Product Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500 "
                    placeholder="Enter product description" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Product Type (Veg/Non-Veg) -->
            <div>
                <p class="text-sm font-medium text-gray-700 mb-2">Product Type</p>
                <div class="flex items-center space-x-4">
                    <!-- Veg Option -->
                    <div class="flex items-center">
                        <input type="radio" name="isVeg" id="isVeg" value="1" checked
                            class="h-4 w-4 text-teal-600 border-gray-300 focus:ring-teal-500"
                            {{ old('isVeg') == 'Veg' ? 'checked' : '' }} required />
                        <label for="isVeg" class="ml-2 text-sm text-gray-700">Vegetarian</label>
                    </div>

                    <!-- Non-Veg Option -->
                    <div class="flex items-center">
                        <input type="radio" name="isVeg" id="nonVeg" value="0"
                            class="h-4 w-4 text-teal-600 border-gray-300 focus:ring-teal-500"
                            {{ old('isVeg') == 'NonVeg' ? 'checked' : '' }} required />
                        <label for="nonVeg" class="ml-2 text-sm text-gray-700">Non-Vegetarian</label>
                    </div>
                </div>
                @error('isVeg')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price and Discount -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                    <input type="number" name="price" id="price" step="0.01"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
                        placeholder="Enter product price" value="{{ old('price') }}" required />
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="discount_price" class="block text-sm font-medium text-gray-700 mb-1">Discount Price</label>
                    <input type="number" name="discount_price" id="discount_price" step="0.01"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
                        placeholder="Enter discounted price" value="{{ old('discount_price') }}" />
                    @error('discount_price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Product Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                <input type="file" name="image" id="image"
                    class="w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                    accept="image/*" required />
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    Add Product
                </button>
            </div>
        </form>
    </div>
@endsection
