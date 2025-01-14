@extends('admin.adminBase')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-xl font-bold mb-4">Manage Home Page Banner</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.saveOrUpdate') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded p-6">
        @csrf

        <div class="mb-4">
            <label for="banner_title" class="block text-sm font-medium">Banner Title</label>
            <input type="text" name="banner_title" id="banner_title" 
                   class="w-full border-gray-300 rounded mt-1" 
                   value="{{ old('banner_title', $banner?->banner_title) }}" 
                   required>
        </div>

     


        <div class="mb-4">
            <label for="banner_image" class="block text-sm font-medium">Banner Image</label>
            <input type="file" name="banner_image" id="banner_image" 
                   class="w-full border-gray-300 rounded mt-1">
            @if($banner?->banner_image)
                <img src="{{ asset('storage/' . $banner->banner_image) }}" alt="Banner Image" class="mt-4 max-h-32">
            @endif
        </div>

        <button type="submit" class="bg-green-500 w-full text-white px-4 py-2 rounded">Save Banner</button>
    </form>
</div>
@endsection
