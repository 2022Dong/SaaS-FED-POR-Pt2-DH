<x-app-layout>
    <!-- Deleted Job Listings -->
    <article class="container mx-auto max-w-7xl">
        <header class="py-4 bg-gray-600 text-gray-200 px-4 rounded-t-lg mb-4 flex flex-row justify-between items-center">
            <div>
                <h2 class="text-3xl font-semibold">Management Area</h2>
                <h3 class="text-2xl">Listings Recycle Bin</h3>
            </div>
            <i class="fa fa-pencil text-4xl"></i>
        </header>

        @if(Session::has('success'))
        <section id="Messages" class="my-4 px-4">
            <div class="p-4 border-green-500 bg-green-100 text-green-700 rounded-lg">
                {{Session::get('success')}}
            </div>
        </section>
        @endif

        <section class="px-4 pb-8">
            <header class="flex flex-row justify-between items-center gap-2">
                <p class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Deleted Listings') }}
                </p>
                <section class="flex flex-row justify-between gap-4">
                    <a href="{{ route('listings.index') }}" class="p-2 px-4 text-center rounded-md h-10 flex gap-4
                              text-gray-600 hover:text-gray-200 bg-gray-200 hover:bg-gray-500
                              duration-300 ease-in-out transition-all items-center">
                        <i class="fa fa-arrow-left text-lg"></i>
                        {{ __('Listings') }}
                    </a>
                    @can('listing-trash-restore')
                    <form class="flex flex-row gap-2 items-center justify-end" action="{{ route('listings.trash-recover') }}" method="POST">
                        @CSRF
                        <button type="submit" class="p-2 px-4  text-center rounded-md
                                   text-blue-600 hover:text-blue-200 dark:hover:text-blue-900
                                   bg-blue-200 dark:bg-blue-900 hover:bg-blue-500
                                   duration-300 ease-in-out transition-all">
                            <i class="fa fa-trash-arrow-up text-lg"></i>
                            {{ __('Restore All') }}
                        </button>
                    </form>
                    @endcan
                    @can('listing-trash-empty')
                    <form class="flex flex-row gap-2 items-center justify-end" action="{{ route('listings.trash-empty') }}" method="POST">
                        @CSRF
                        @method('delete')
                        <button type="submit" class="p-2 px-4  text-center rounded-md
                                   text-red-600 hover:text-red-200 dark:hover:text-red-900
                                   bg-red-200 dark:bg-red-900 hover:bg-red-500
                                   duration-300 ease-in-out transition-all">
                            <i class="fa fa-trash text-lg"></i>
                            Empty Trash
                        </button>
                    </form>
                    @endcan
                </section>
            </header>

            <table class="mt-4 table bg-white dark:bg-gray-800
                          overflow-hidden shadow-sm sm:rounded-lg
                          border border-gray-600 dark:border-gray-700 w-full">

                <thead class="py-1 px-2 bg-gray-700 text-gray-200 ">

                    <tr class="bg-gray-400 text-gray-800 py-2 rounded-lg ">
                        <th class="pl-2 flex-0 text-left">Title</th>
                        <th class="text-left">Description</th>
                        <th class="text-left">Salary</th>
                        <th class="text-left">Location</th>
                        <th class="text-left">Tags</th>
                        <th class="text-left">Deleted</th>
                        <th class="pr-2 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($clientListings as $listing)
                    <tr class="group
                               hover:bg-gray-200 dark:hover:bg-gray-900 ease-in-out duration-300 transition-all
                               border border-gray-200 dark:border-gray-700
                               dark:text-gray-400">

                        <td class="py-2 pl-2 flex-0 text-left">{{ $listing->title }}</td>
                        <td class="py-2 text-left">{{ $listing->description }}</td>
                        <td class="py-2 text-left">{{ $listing->salary }}</td>
                        <td class="py-2 text-left">{{ $listing->city }}, {{ $listing->state }}</td>
                        <td class="py-2 text-left">{{ $listing->tags }}</td>
                        <td class="py-2 text-left">{{ $listing->deleted_at }}</td>
                        <td class="py-2 pr-2 text-right">
                            <form class="flex flex-row gap-2 items-center justify-end" action="{{ route('listings.trash-remove', $listing) }}" method="POST">
                                @csrf
                                @method('delete')

                                <a href="{{ route('listings.trash-restore', $listing) }}" class="py-1 px-4 text-center rounded-md flex gap-4 items-center
                                          text-blue-600 hover:text-blue-200 dark:hover:text-black bg-blue-200 dark:bg-black hover:bg-blue-500
                                          duration-300 ease-in-out transition-all">
                                    <i class="fa fa-listing-check"></i>
                                    <span>Restore</span>
                                </a>

                                <button type="submit" class="p-1 px-2 text-center rounded-md flex gap-4 items-center
                                               text-red-600 hover:text-red-200 dark:hover:text-black bg-red-200 dark:bg-black hover:bg-red-500
                                               duration-300 ease-in-out transition-all">
                                    <i class="fa fa-listing-slash"></i>
                                    <span>Remove!</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7" class="py-1 px-2 bg-gray-200 dark:bg-gray-700
                                border border-transparent border-t-gray-500">

                        </td>
                    </tr>
                </tfoot>
            </table>
            </div>

        </section>
    </article>
</x-app-layout>