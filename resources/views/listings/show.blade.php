<x-app-layout>
    <section class="container mx-auto p-4 mt-4">
        <div class="rounded-lg shadow-md bg-white p-3">
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

            <div class="flex justify-between items-center">
                <a class="block p-4 text-blue-700" href="/listings">
                    <i class="fa fa-arrow-alt-circle-left"></i>
                    Back To Listings
                </a>

                @if(auth()->user()->hasAnyRole(['Staff', 'Super-Admin', 'Admin']) || auth()->user()->hasRole('Client') && auth()->user()->id == $listing->user_id)
                <div class="flex space-x-4 ml-4">
                    <a href="{{ route('listings.edit', $listing) }}" class="p-1 px-6 text-center rounded-md
                                      text-purple-600 hover:text-purple-200 dark:hover:text-black bg-purple-200 dark:bg-black hover:bg-purple-500
                                      duration-300 ease-in-out transition-all">
                        <i class="fa fa-pen text-lg"></i> Edit</a>
                    <!-- Confirm Delete -->
                    <a href="{{ route('listing.delete', $listing) }}" class="p-1 px-2 text-center rounded-md
                                           text-red-600 hover:text-red-200 dark:hover:text-black bg-red-200 dark:bg-black hover:bg-red-500
                                           duration-300 ease-in-out transition-all">
                        <i class="fa fa-trash text-lg"></i> Delete</a>
                    <!-- Delete -->
                    <a href="{{ route('listings.trash') }}" class="p-2 px-4 text-center rounded-md h-10                              
                              duration-300 ease-in-out transition-all space-x-2">
                        <i class="fa fa-trash font-xl"></i>
                        {{ __('Deleted') }}
                    </a>
                </div>
                @endif

            </div>
            <div class="p-4">
                <h2 class="text-xl font-semibold">{{ $listing->title }}</h2>
                <p class="text-gray-700 text-lg mt-2">
                    {{ $listing->description }}
                </p>
                <ul class="my-4 bg-gray-100 p-4">
                    <li class="mb-2"><strong>Salary:</strong> {{ $listing->salary }}</li>
                    <li class="mb-2">
                        <strong>Location:</strong> {{ $listing->city }}, {{ $listing->state }}
                        <span class="text-xs bg-blue-500 text-white rounded-full px-2 py-1 ml-2">Local</span>
                    </li>
                    <?php if (!empty($listing->tags)) : ?>
                        <li class="mb-2">
                            <strong>Tags:</strong> <span>{{ $listing->tags }}</span>,
                            <!--<span>Coding</span>-->
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="container mx-auto p-4">
        <h2 class="text-xl font-semibold mb-4">Job Details</h2>
        <div class="rounded-lg shadow-md bg-white p-4">
            <h3 class="text-lg font-semibold mb-2 text-blue-500">
                Job Requirements
            </h3>
            <p>
                {{ $listing->requirements }}
            </p>
            <h3 class="text-lg font-semibold mt-4 mb-2 text-blue-500">Benefits</h3>
            <p><?= $listing->benefits ?></p>
        </div>
        <p class="my-5">
            Put "Job Application" as the subject of your email and attach your
            resume.
        </p>
        <a href="mailto:{{ $listing->email }}" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
            Apply Now
        </a>
    </section>
</x-app-layout>