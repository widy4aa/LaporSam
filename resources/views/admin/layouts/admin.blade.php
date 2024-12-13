<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.0/dist/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
@livewireStyles

<body>
    @include('admin.layouts.components.navbar')
    @include('admin.layouts.components.sidebar-admin')
    <div class="ml-64 pt-20 bg-gray-100 h-screen">
        @yield('content')

    </div>

@livewireScripts

</body>

</html>
