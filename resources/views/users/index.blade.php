<x-app-layout>
    <x-slot name="topBanner">
        <section class="bg-red-900 text-white py-6 text-center">
            <div class="container mx-auto">
                <h2 class="text-3xl font-semibold">Management Area</h2>
            </div>
        </section>
    </x-slot>

    <div class="py-0 mb-6">
        <article class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <header class="flex justify-between mb-2">
                <h2 class="pb-4 font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Users') }}
                </h2>
                <div class="flex flex-row gap-4">
                <a href="{{ route('users.create') }}"
                   class="p-2 px-4 text-center rounded-md h-10
                                      text-blue-600 hover:text-blue-200 bg-blue-200 hover:bg-blue-500
                                      duration-300 ease-in-out transition-all">
                    <i class="fa fa-plus font-xl"></i>
                    New User
                </a>

                <a href="{{ route('welcome') }}"
                   class="p-2 px-4 text-center rounded-md h-10
                   @if(0)
                   text-slate-200 hover:text-slate-600 bg-slate-600 hover:bg-slate-500
                   @else
                   text-slate-600 hover:text-slate-200 bg-slate-200 hover:bg-slate-500
                   @endif
                          duration-300 ease-in-out transition-all space-x-2">
                    <i class="fa fa-trash font-xl"></i>
                    {{  }} Deleted Users
                </a>

                </div>
            </header>

            <table
                class="table bg-white dark:bg-gray-800
                       overflow-hidden shadow-sm sm:rounded-lg
                       border border-gray-300 dark:border-gray-700 w-full">

                <thead class="py-1 px-2 bg-gray-700 text-gray-200 w-full">

                <tr>
                    <th class="pl-2 w-18 flex-0 text-left"></th>
                    <th class=" text-left" >Name &amp; Email</th>
                    <th class=" text-left">Last Login</th>
                    <th class="pr-2 text-right">Actions</th>
                </tr>

                </thead>

                <tbody>
                @foreach($users as $user)

                    <tr class="group hover:bg-gray-200 dark:hover:bg-gray-900 ease-in-out duration-300 transition-all
                                    border border-transparent border-b-gray-200 dark:border-b-gray-700 dark:text-gray-400 w-full">

                        <td class="py-2 pl-2 w-8 flex-0 text-left">
                            {{ $user->status ?? "-" }}
                        </td>

                        <td class="py-2 text-left flex flex-col">
                                <span>{{ $user->name }}</span>
                                <span class="text-xs text-gray-600 dark:text-gray-600">{{ $user->email }}</span>
                        </td>

                        <td class="py-2 text-left">
                            <p class="flex flex-col gap-0">
                            <span>
                                {{ $user->login_at ?? "" }}
                            </span>
                                <span class="text-sm text-gray-600 dark:text-gray-400 -mt-1">
                                {{ !is_null($user->login_at) ?  $user->login_at->diffForHumans() : ' '}}
                            </span>
                            </p>
                        </td>

                        <td class="py-2 pr-2 text-right">
                            <form class="flex flex-row gap-2 items-center justify-end"
                                  action="{{ route('welcome', $user) }}"
                                  method="POST">
                                @CSRF

                                <a href="{{ route('welcome', $user) }}"
                                   class="p-1 w-10 text-center rounded-md
                                          text-blue-600 hover:text-blue-200 dark:hover:text-black bg-blue-200 dark:bg-black hover:bg-blue-500
                                          duration-300 ease-in-out transition-all">
                                    <i class="fa fa-eye text-lg"></i>
                                    <span class="sr-only hidden">View</span>
                                </a>
                                <a href="{{ route('welcome', $user) }}"
                                   class="p-1 w-10 text-center rounded-md
                                          text-purple-600 hover:text-purple-200 dark:hover:text-black bg-purple-200 dark:bg-black hover:bg-purple-500
                                          duration-300 ease-in-out transition-all">
                                    <i class="fa fa-pen text-lg"></i>
                                    <span class="sr-only">Edit</span>
                                </a>
                                <button type="cancel"
                                        class="p-1 w-10 text-center rounded-md
                                               text-red-600 hover:text-red-200 dark:hover:text-black bg-red-200 dark:bg-black hover:bg-red-500
                                               duration-300 ease-in-out transition-all">
                                    <i class="fa fa-trash text-lg"></i>
                                    <span class="sr-only">Delete</span>
                                </button>
                            </form>
                        </td>

                    </tr>

                @endforeach
                </tbody>

                <tfoot>

                <tr>
                    <td colspan="4" class="w-full py-1 px-2 bg-gray-300 dark:bg-gray-700
                                border border-transparent border-t-gray-500">
                        {{ $users->links() }}
                    </td>
                </tr>

                </tfoot>

            </table>

        </article>
    </div>

</x-app-layout>
