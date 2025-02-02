@extends('admin.adminBase')


@section('content')
    <div class="min-h-screen flex">
        <!-- Main Content -->
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-4 py-4">
                    <div class="flex items-center">
                        <button class="md:hidden">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <h1 class="text-xl font-semibold text-gray-800 ml-2">Dashboard Overview</h1>
                    </div>
                    <div class="flex items-center">
                        <!-- User dropdown -->
                        <div class="relative">
                            <button class="flex items-center">
                                <span class="mr-2">Admin User</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="p-6">
                <!-- Stats Overview -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="text-gray-500 text-sm">Total Orders</h3>
                        <p class="text-2xl font-bold">1,234</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="text-gray-500 text-sm">Active Users</h3>
                        <p class="text-2xl font-bold">567</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="text-gray-500 text-sm">Revenue</h3>
                        <p class="text-2xl font-bold">$12,345</p>
                    </div>
                </div>

                <!-- Recent Orders Table -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold">Recent Orders</h2>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">View All</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-gray-500 border-b">
                                    <th class="pb-3">Order ID</th>
                                    <th class="pb-3">Customer</th>
                                    <th class="pb-3">Items</th>
                                    <th class="pb-3">Amount</th>
                                    <th class="pb-3">Status</th>
                                    <th class="pb-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Data -->
                                <tr class="border-b">
                                    <td class="py-4">#1234</td>
                                    <td>John Doe</td>
                                    <td>3</td>
                                    <td>$45.00</td>
                                    <td>
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                            Completed
                                        </span>
                                    </td>
                                    <td>
                                        <button class="text-blue-500 hover:text-blue-700">View</button>
                                        <button class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                                    </td>
                                </tr>
                                <!-- Add more rows -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Menu Items Section -->
                <div class="mt-6 bg-white rounded-lg shadow-sm p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold">Menu Items</h2>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add New Item</button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Sample Menu Item Card -->
                        <div class="border rounded-lg p-4">
                            <img src="placeholder-food.jpg" alt="Item" class="w-full h-32 object-cover mb-2">
                            <h3 class="font-semibold">Burger</h3>
                            <p class="text-gray-500 text-sm">$12.99</p>
                            <div class="mt-2 flex justify-end space-x-2">
                                <button class="text-blue-500">Edit</button>
                                <button class="text-red-500">Delete</button>
                            </div>
                        </div>
                        <!-- Add more menu items -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Modals Here -->
    <!-- Example Add Item Modal -->
    <div class="fixed inset-0 bg-black bg-opacity-50 hidden" id="addItemModal">
        <div class="bg-white p-6 rounded-lg max-w-md m-auto mt-10">
            <h3 class="text-xl font-semibold mb-4">Add New Menu Item</h3>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Item Name</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Price</label>
                    <input type="number" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Description</label>
                    <textarea class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="mr-2 px-4 py-2 text-gray-500">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Save Item</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Add JavaScript for modal toggle, sidebar toggle, etc.
        // Example using Alpine.js:
        // document.addEventListener('alpine:init', () => {
        //     Alpine.data('dashboard', () => ({
        //         openModal: false,
        //         sidebarOpen: true
        //     }))
        // })
    </script>
@endsection
