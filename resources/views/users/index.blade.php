<x-app-layout>
    <article class="container mx-auto max-w-7xl">
        <header class="py-4 bg-gray-600 text-gray-200 px-4 rounded-t-lg mb-4 flex flex-row justify-between items-center">
            <div>
                <h2 class="text-3xl font-semibold">Management Area</h2>
                <h3 class="text-2xl">Users</h3>
            </div>
            <i class="fa fa-users text-5xl"></i>
        </header>

        @if(Session::has('success'))
        <section id="Messages" class="my-4 px-4">
            <div class="p-4 border-green-500 bg-green-100 text-green-700 rounded-lg">
                {{ Session::get('success') }}
            </div>
        </section>
        @endif

        <section class="px-4 pb-8">
            <header class="flex flex-row justify-between items-center gap-2">
                <p class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Browse') }}
                </p>

                <form action="{{ route('users.index') }}" method="get" class="flex flex-row gap-4 items-center mb-4">
                    <x-input-label for="Search" :value="__('Search')" class="sr-only" />
                    <x-text-input id="Search" name="search" type="text" :value="old('search')??$search" class="mr-2 w-72" />
                    <x-primary-button class="bg-neutral-500">{{ __('Search!') }}</x-primary-button>
                </form>

                <section class="flex flex-row justify-between gap-4">
                    <a href="{{ route('users.create') }}" class="p-2 px-4 text-center rounded-md h-10
                              text-blue-600 hover:text-blue-200 bg-blue-200 hover:bg-blue-500
                              duration-300 ease-in-out transition-all">
                        <i class="fa fa-user-plus font-xl"></i>
                        {{ __('New User') }}
                    </a>

                    @can('user-trash-recover')
                    <a href="{{ route('users.trash') }}" class="p-2 px-4 text-center rounded-md h-10                              
                              duration-300 ease-in-out transition-all space-x-2">
                        <i class="fa fa-trash font-xl"></i>
                        {{ $trashedCount }} {{ __('Deleted') }}
                    </a>
                    @endcan
                </section>
            </header>

            <table class="mt-4 table bg-white dark:bg-gray-800
                          overflow-hidden shadow-sm sm:rounded-lg
                          border border-gray-600 dark:border-gray-700 w-full">

                <thead class="py-1 px-2 bg-gray-700 text-gray-200 ">
                    <tr class="bg-gray-400 text-gray-800 py-2 rounded-lg ">
                        <th class="pl-2 flex-0 text-left">Name</th>
                        <th class="text-left">Email</th>
                        <th class="text-left">Last Login</th>
                        <th class="text-left">Role</th>
                        <th class="pr-2 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr class="group
                               hover:bg-gray-200 dark:hover:bg-gray-900 ease-in-out duration-300 transition-all
                               border border-gray-200 dark:border-gray-700
                               dark:text-gray-400">
                        <td class="py-2 pl-2 flex-0 text-left">{{ $user->name }}</td>
                        <td class="py-2 text-left">{{ $user->email }}</td>
                        <td class="py-2 text-left">{{ $user->updated_at }}</td>
                        <td class="py-2 text-left">{{ $user->roles->pluck('name')->implode(', ') }}</td>
                        <td class="py-2 pr-2 text-right">
                            <form class="flex flex-row gap-2 items-center justify-end" action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('delete')

                                <!-- View Button, always visible -->
                                <a href="{{ route('users.show', $user) }}" class="p-1 w-10 text-center rounded-md
                                    text-blue-600 hover:text-blue-200 dark:hover:text-black bg-blue-200 dark:bg-black hover:bg-blue-500
                                    duration-300 ease-in-out transition-all">
                                    <i class="fa fa-eye text-lg"></i>
                                    <span class="sr-only hidden">View</span>
                                </a>

                                <!-- Edit and Delete buttons conditional -->
                                @if (
                                (auth()->user()->hasRole('Super-Admin')) ||
                                (auth()->user()->hasRole('Admin') && ($user->hasRole('Staff') || $user->hasRole('Client') || $user->hasRole('Guest') || $user->roles->isEmpty())) ||
                                (auth()->user()->hasRole('Staff') && ($user->hasRole('Client') || $user->hasRole('Guest') || $user->roles->isEmpty()))
                                )
                                <a href="{{ route('users.edit', $user) }}" class="p-1 w-10 text-center rounded-md
                                        text-purple-600 hover:text-purple-200 dark:hover:text-black bg-purple-200 dark:bg-black hover:bg-purple-500
                                        duration-300 ease-in-out transition-all">
                                    <i class="fa fa-pen text-lg"></i>
                                    <span class="sr-only">Edit</span>
                                </a>

                                <a href="{{ route('user.delete', $user) }}" class="p-1 w-10 text-center rounded-md
                                        text-red-600 hover:text-red-200 dark:hover:text-black bg-red-200 dark:bg-black hover:bg-red-500
                                        duration-300 ease-in-out transition-all">
                                    <i class="fa fa-trash text-lg"></i>
                                    <span class="sr-only">Delete</span>
                                </a>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="py-1 px-2 bg-gray-200 dark:bg-gray-700
                                border border-transparent border-t-gray-500">
                            @if($users->hasPages())
                            {{ $users->links() }}
                            @else
                            <small>No pages</small>
                            @endif
                        </td>
                    </tr>
                </tfoot>
            </table>
        </section>
    </article>
</x-app-layout>