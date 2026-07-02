<nav class="w-72 bg-white border-r border-gray-200 shadow-sm min-h-screen flex flex-col">

    <!-- Logo -->
    <div class="px-6 py-6 border-b">
        <h1 class="text-2xl font-bold text-indigo-600">
            UMS
        </h1>

        <p class="text-gray-500 text-sm">
            User Management System
        </p>
    </div>

    <!-- Menu -->
    <div class="flex-1 px-4 py-6 space-y-2">

        <a href="{{ route('dashboard') }}"
           class="block px-4 py-3 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">

            🏠 Dashboard

        </a>

        <a href="#"
           class="block px-4 py-3 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">

            👥 Users

        </a>

        <a href="#"
           class="block px-4 py-3 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">

            🛡 Roles

        </a>

        <a href="#"
           class="block px-4 py-3 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">

            🔑 Permissions

        </a>

        <a href="#"
           class="block px-4 py-3 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">

            📝 Activity Logs

        </a>

        <a href="{{ route('profile') }}"
           class="block px-4 py-3 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">

            👤 Profile

        </a>

    </div>

    <!-- User -->
    <div class="border-t px-6 py-5">

        <div class="font-semibold">
            {{ auth()->user()->name }}
        </div>

        <div class="text-sm text-gray-500">
            {{ auth()->user()->getRoleNames()->first() ?? 'User' }}
        </div>

        <form method="POST"
              action="{{ route('logout') }}"
              class="mt-4">

            @csrf

            <button
                class="w-full bg-red-500 hover:bg-red-600 text-white rounded-lg py-2">

                Logout

            </button>

        </form>

    </div>

</nav>