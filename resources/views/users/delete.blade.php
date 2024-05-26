<x-app-layout>
    <article class="container mx-auto max-w-7xl">
        <header class="py-4 bg-gray-600 text-gray-200 px-4 rounded-t-lg mb-4 flex flex-row justify-between items-center">
            <div>
                <h2 class="text-3xl font-semibold">Management Area</h2>
                <h3 class="text-2xl">Delete User</h3>
            </div>
            <i class="fa fa-user text-5xl"></i>
        </header>

        @if(Session::has('success'))
        <section id="Messages" class="my-4 px-4">
            <div class="p-4 border-green-500 bg-green-100 text-green-700 rounded-lg">
                {{Session::get('success')}}
            </div>
        </section>
        @endif


        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach


        <section class="flex flex-col gap-4 p-4">
            <div class="grid grid-cols-12">
                <p class="col-span-12 md:col-span-2 xl:col-span-1 text-gray-500">Name</p>
                <p class="col-span-12 md:col-span-10 xl:col-span-11 ">{{ $user->name }}</p>
            </div>

            <div class="grid grid-cols-12">
                <p class="col-span-12 md:col-span-2 xl:col-span-1 text-gray-500">Email</p>
                <p class="col-span-12 md:col-span-10 xl:col-span-11 ">{{ $user->email }}</p>
            </div>

            <div class="grid grid-cols-12">
                <p class="col-span-12 md:col-span-2 xl:col-span-1 text-gray-500">Last Login</p>
                <p class="col-span-12 md:col-span-10 xl:col-span-11  ">{{ $user->login_at ?? "---" }}</p>
            </div>

            <div class="grid grid-cols-12">
                <p class="col-span-12 md:col-span-2 xl:col-span-1 text-gray-500">Status</p>
                <p class="col-span-12 md:col-span-10 xl:col-span-11 ">{{ $user->status ?? "---" }}</p>
            </div>

            <div class="grid grid-cols-12">
                <p class="col-span-12 md:col-span-2 xl:col-span-1 text-gray-500">Actions</p>
                <form class="col-span-12 md:col-span-10 xl:col-span-11 flex flex-row gap-2 items-center " action="{{ route('users.destroy', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="py-1 px-2 text-center rounded-md
                               text-red-800 dark:text-red-400 hover:text-red-100 dark:hover:text-black
                               bg-red-200   dark:bg-red-900   hover:bg-red-500   dark:hover:bg-red-500
                               duration-300 ease-in-out transition-all space-x-2">
                        <i class="fa fa-trash text-lg"></i>
                        <span class="">Confirm Delete</span>
                    </button>

                    <a href="{{ route('users.index', $user) }}" class="py-1 px-2 min-w-40 text-center rounded-md
                          text-blue-800 dark:text-blue-100 hover:text-blue-100 dark:hover:text-black
                          bg-blue-300   dark:bg-blue-900   hover:bg-blue-500   dark:hover:bg-blue-500
                          duration-300 ease-in-out transition-all">
                        <i class="fa fa-xmark text-lg pr-2"></i>
                        <span class="">Cancel</span>
                    </a>

                </form>
            </div>

        </section>
    </article>
</x-app-layout>