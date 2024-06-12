<x-app-layout>
    <div class="min-h-screen bg-neutral-100 flex flex-col flex-between">





        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-neutral-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                Admin | {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class="bg-neutral-100 grow">
            <div class="mx-auto container mt-6 px-6 py-4 overflow-hidden ">
                {{ $slot }}
            </div>
        </main>

        <footer class="py-16 text-center text-sm text-black /70">
            Administration Facing Footer
        </footer>

        @include('layouts.dev-mode')

    </div>

</x-app-layout>