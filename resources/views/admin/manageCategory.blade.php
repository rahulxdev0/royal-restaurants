@extends('admin.adminBase')

@section('content')
    <div class="">
        <div class="flex items-center justify-between px-2">
            <h1 class="text-2xl font-semibold text-gray-700">Manage Category ({{ count($categories) }})</h1>
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="bg-orange-600 text-white px-5 py-2 text-sm font-semibold rounded-lg">
                Add new category
            </button>
        </div>
        {{-- table section --}}

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Category Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category Name
                        </th>
                        <th scope="col" class="px-6 py-3 flex justify-end">
                            <span class="mr-5">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-100 ">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->cat_title }}
                            </td>
                            <td class="px-6 py-4 text-right flex justify-end">
                                <button data-modal-target="authentication-modal{{ $item->id }}" data-modal-toggle="authentication-modal{{ $item->id }}"
                                    class="font-medium text-blue-600 hover:underline">Edit
                                </button>
                                <div class="action">
                                    <form action="{{ route("admin.category.delete", $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="text" name="cat_id" value="{{ $item->id }}" hidden>
                                        <input type="submit" value="Delete" class="text-red-600 font-medium hover:underline ml-5"/>
                                    </form>
                                </div>
                                {{-- <a href="#" class="font-medium text-blue-600 hover:underline ml-5">Delete</a> --}}
                            </td>
                        </tr>
                        {{-- edit model --}}
                        <div id="authentication-modal{{ $item->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Edit Category 
                                        </h3>
                                        <button type="button"
                                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="authentication-modal{{ $item->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    {{-- form box --}}
                                    <div class="p-4 md:p-5">
                                        <form class="space-y-4" action="{{ route("admin.category.update", $item->id) }}" method="post">
                                            @csrf
                                            <div>
                                                <label for="title"
                                                    class="block mb-4 text-md font-medium text-gray-700 dark:text-white">Category
                                                    Title</label>
                                                <input type="input" name="cat_title" value="{{ $item->cat_title }}" id="title"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 mb-4 text-sm rounded-lg  block w-full p-2.5 "
                                                    placeholder="Fast Food" required />
                                                @error('cat_title')
                                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <button type="submit"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update
                                                 category
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Add new category
                        </h3>
                        <button type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" action={{ route('admin.category') }} method="post">
                            @csrf
                            <div>
                                <label for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                                    Title</label>
                                <input type="input" name="cat_title" value="{{ old('cat_title') }}" id="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 "
                                    placeholder="Fast Food" required />
                                @error('cat_title')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create
                                new category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
