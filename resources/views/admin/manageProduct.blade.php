@extends('admin.adminBase')


@section('content')
    <div class="">
        <div class="flex items-center justify-between px-2">
            <h1 class="text-2xl font-semibold text-gray-700">Manage Products({{ count($products) }}) </h1>
            <a href="{{ route('admin.inset_product') }}"
                class="bg-orange-600 text-white px-5 py-2 text-sm font-semibold rounded-lg">
                Add New Product
            </a>
        </div>

        {{-- table section --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Discount Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b hover:bg-gray-50 ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $product->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->title }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($product->isVeg == 1)
                                    <span class=" text-green-600">Veg</span>  
                                @else
                                <span class=" text-red-600 ">Non-Veg</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->category->cat_title }}
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="product image"
                                    class="w-10 h-10 object-contain">
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->discount_price }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
