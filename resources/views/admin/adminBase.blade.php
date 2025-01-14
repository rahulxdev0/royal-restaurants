<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | {{ env('APP_NAME') }} | Tase Better</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex flex-col  h-screen fixed">
            <!-- Logo Section -->
            <div class="px-6 py-4">
                <h1 class="text-lg font-bold text-center">Admin Panel</h1>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-4 space-y-2">
                <a href={{ route('admin.dashboard') }} class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-800">
                    <span class="material-icons">dashboard</span>
                    <span>Dashboard</span>
                </a>
                <a href={{ route("admin.category") }} class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-800">
                    <span class="material-icons">menu_book</span>
                    <span>Manage Category</span>
                </a>
                <a href="{{ route('admin.product') }}" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-800">
                    <span class="material-icons">menu_book</span>
                    <span>Manage Products</span>
                </a>
                <a href="#" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-800">
                    <span class="material-icons">shopping_cart</span>
                    <span>Orders</span>
                </a>
                <a href="#" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-800">
                    <span class="material-icons">event</span>
                    <span>Reservations</span>
                </a>
                <a href="#" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-800">
                    <span class="material-icons">people</span>
                    <span>Customers</span>
                </a>
                <a href="#" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-800">
                    <span class="material-icons">supervised_user_circle</span>
                    <span>Staff</span>
                </a>
                <a href="#" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-800">
                    <span class="material-icons">analytics</span>
                    <span>Reports</span>
                </a>
                <a href="{{route('settings.createOrUpdate')}}" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-800">
                    <span class="material-icons">settings</span>
                    <span>Settings</span>
                </a>
            </nav>

            <!-- Footer -->
            <div class="px-4 py-2 border-t border-gray-700">
                <button class="w-full flex items-center space-x-2 px-4 py-2 rounded bg-red-600 hover:bg-orange-600">
                    <span class="material-icons">logout</span>
                    <span>Logout</span>
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 ml-64">
            @section('content')

            @show
        </main>
    </div>

    <!-- Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    
</body>

</html>
