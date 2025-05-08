<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{-- {{ $slot }} --}}
            @yield('content')
        </main>
    </div>

    {{-- <script>
        const toggleButton = document.getElementById('notificationToggle');
        const dropdown = document.getElementById('notificationDropdown');
        const markAllReadBtn = document.getElementById('markAllReadBtn');
        const notificationList = document.getElementById('notificationList');

        // Toggle dropdown visibility
        toggleButton.addEventListener('click', function(event) {
            event.stopPropagation(); // prevent bubbling
            dropdown.classList.toggle('hidden');
        });

        // Close dropdown if clicking outside
        document.addEventListener('click', function(event) {
            if (!dropdown.classList.contains('hidden') &&
                !dropdown.contains(event.target) &&
                event.target !== toggleButton) {
                dropdown.classList.add('hidden');
            }
        });

        // Handle "Mark all as read"
        markAllReadBtn.addEventListener('click', function() {
            notificationList.innerHTML = `
                <li class="px-4 py-2 text-gray-500 text-sm text-center">All notifications are read.</li>
            `;
            // Optional: AJAX call to mark all as read in database
            // fetch('/notifications/mark-read', { method: 'POST', headers: { 'X-CSRF-TOKEN': '...' } });
        });
    </script> --}}
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        // Lucide Icons init
        lucide.createIcons();

        // Toggle dropdown
        document.getElementById('toggleNotifications').addEventListener('click', function() {
            document.getElementById('notificationDropdown').classList.toggle('hidden');
        });
    </script>
</body>

</html>
