<x-app-layout>
    <x-slot name="topBanner">
        <section class="bg-red-900 text-white py-6 text-center">
            <div class="container mx-auto">
                <h2 class="text-3xl font-semibold">Management Area</h2>
            </div>
        </section>
    </x-slot>

    <article class="py-0 mb-6 max-w-8xl mx-auto sm:px-6 lg:px-8">
        <header>
            <h2 class="pb-4 font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User Details') }}
            </h2>
        </header>
        <section
            class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-800 dark:text-gray-300
                   grid grid-cols-12 gap-4 p-4 overflow-hidden shadow-sm rounded-lg ">

                <p class="col-span-12 md:col-span-2 xl:col-span-1 text-gray-500">Name</p>
                <p class="col-span-12 md:col-span-10 xl:col-span-11 ">{{ $user->name }}</p>


                <p class="col-span-12 md:col-span-2 xl:col-span-1 text-gray-500">Email</p>
                <p class="col-span-12 md:col-span-10 xl:col-span-11 ">{{ $user->email }}</p>


                <p class="col-span-12 md:col-span-2 xl:col-span-1 text-gray-500">Last Login</p>
                <p class="col-span-12 md:col-span-10 xl:col-span-11  ">{{ $user->login_at ?? "---" }}</p>


                <p class="col-span-12 md:col-span-2 xl:col-span-1 text-gray-500">Status</p>
                <p class="col-span-12 md:col-span-10 xl:col-span-11 ">{{ $user->status ?? "---" }}</p>


                <p    class="col-span-12 md:col-span-2 xl:col-span-1 text-gray-500">Actions</p>
                <form class="col-span-12 md:col-span-10 xl:col-span-11 flex flex-row gap-2 items-center "
                      action="{{ route('welcome', $user) }}"
                      method="POST">
                    @CSRF
                    @method('')
                    <a href="{{ route('welcome') }}"
                       class="p-1 w-10 text-center rounded-md
                                      text-blue-600 hover:text-blue-200 dark:hover:text-black bg-blue-200 dark:bg-black hover:bg-blue-500
                                      duration-300 ease-in-out transition-all">
                        <i class="fa fa-list text-lg"></i>
                        <span class="sr-only hidden">Users Index</span>
                    </a>
                    <a href="{{ route('welcome', $user) }}"
                       class="p-1 w-10 text-center rounded-md
                                      text-purple-600 hover:text-purple-200 dark:hover:text-black bg-purple-200 dark:bg-black hover:bg-purple-500
                                      duration-300 ease-in-out transition-all">
                        <i class="fa fa-pen text-lg"></i>
                        <span class="sr-only">Edit User</span>
                    </a>
                    <button type="cancel"
                            class="p-1 w-10 text-center rounded-md
                                           text-red-600 hover:text-red-200 dark:hover:text-black bg-red-200 dark:bg-black hover:bg-red-500
                                           duration-300 ease-in-out transition-all">
                        <i class="fa fa-trash text-lg"></i>
                        <span class="sr-only">Delete User</span>
                    </button>
                </form>


        </section>

    </article>

</x-app-layout>
