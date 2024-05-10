<x-app-layout>
    <x-slot name="topBanner">
        <section class="bg-red-900 text-white py-6 text-center">
            <div class="container mx-auto">
                <h2 class="text-3xl font-semibold">{{ __('Management Area') }}</h2>
            </div>
        </section>
    </x-slot>

    <div class="py-0 mb-6">
        <article class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <header class="flex justify-between mb-2">
                <h2 class="pb-4 font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Users Marked for Deletion') }}
                </h2>
                <div class="flex flex-row gap-2 justify-end">
                    <a href="{{ route('welcome') }}"
                       class="p-2 px-4 text-center rounded-md
                              text-green-600 hover:text-green-200  dark:hover:text-green-900
                              bg-green-200 dark:bg-green-900 hover:bg-green-500
                              duration-300 ease-in-out transition-all">
                        <i class="fa fa-list text-lg"></i>
                        {{ __('User List') }}
                    </a>

                    <form class="flex flex-row gap-2 items-center justify-end"
                          action="{{ route('welcome') }}"
                          method="post">
                        @CSRF
                        <button type="cancel"
                                class="p-2 px-4  text-center rounded-md
                                   text-blue-600 hover:text-blue-200 dark:hover:text-blue-900
                                   bg-blue-200 dark:bg-blue-900 hover:bg-blue-500
                                   duration-300 ease-in-out transition-all">
                            <i class="fa fa-trash-arrow-up text-lg"></i>
                            {{ __('Restore All') }}
                        </button>
                    </form>

                    <form class="flex flex-row gap-2 items-center justify-end"
                          action="{{ route('welcome') }}"
                          method="post">
                        @CSRF
                        @method('')
                        <button type="cancel"
                                class="p-2 px-4  text-center rounded-md
                                   text-red-600 hover:text-red-200 dark:hover:text-red-900
                                   bg-red-200 dark:bg-red-900 hover:bg-red-500
                                   duration-300 ease-in-out transition-all">
                            <i class="fa fa-trash text-lg"></i>
                            Empty Trash
                        </button>
                    </form>
                </div>
            </header>

            <table
                class="table bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-300 dark:border-gray-700 w-full">

                <thead class="py-1 px-2 bg-gray-700 text-gray-200 w-full">

                <tr>
                    <th class="pl-2 w-16 flex-0 text-left">&nbsp;</th>
                    <th class=" text-left">Name &amp; Email</th>
                    <th class=" text-left">Last Login</th>
                    <th class="pr-2 text-right">Actions</th>
                </tr>

                </thead>

                <tbody>
                @foreach($users as $user)

                    <tr class="group w-full
                               dark:text-gray-400
                               ease-in-out duration-300 transition-all
                               hover:bg-gray-200 dark:hover:bg-gray-900
                               border border-transparent border-b-gray-200 dark:border-b-gray-700 ">

                        <td class="py-2 pl-2 w-16 flex-0 text-left">
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

                        <td class="py-2 pr-2 text-right flex flex-row gap-2 items-center justify-end">
                            <form
                                  action="{{ route('welcome', $user->id) }}"
                                  method="post">
                                @csrf
                                @method('')
                                <button type="submit"
                                        class="p-2 px-4 text-center rounded-md
                                               text-sky-600 hover:text-sky-100 dark:hover:text-sky-800
                                               bg-sky-200 dark:bg-sky-800 hover:bg-sky-500
                                               duration-300 ease-in-out transition-all">
                                    <i class="fa fa-trash-arrow-up text-lg"></i>
                                    <span class="sr-only hidden">Restore</span>
                                </button>
                            </form>
                            <form class=""
                                  action="{{ route('welcome', $user->id) }}"
                                  method="post">
                                @csrf
                                @method( "" )
                                <button type="submit"
                                        class="p-2 px-4 text-center rounded-md
                                               text-red-600 hover:text-red-100 dark:hover:text-red-800
                                               bg-red-200 dark:bg-red-800 hover:bg-red-500
                                               duration-300 ease-in-out transition-all">
                                    <i class="fa fa-trash text-lg"></i>
                                    <span class="sr-only">Fully Delete</span>
                                </button>
                            </form>
                        </td>

                    </tr>

                @endforeach
                </tbody>


            </table>

        </article>
    </div>

</x-app-layout>
