<x-app-layout>
    <!-- Job Listings -->
    <section>
        <div class="container mx-auto p-4 mt-4">
            <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">
                <?php if (isset($keywords)) : ?>
                    Search Results for: <?= htmlspecialchars($keywords) ?>
                <?php else : ?>
                    All Jobs
                <?php endif; ?>
            </div>

            @if(Session::has('success'))
            <section id="Messages" class="my-4 px-4">
                <div class="p-4 border-green-500 bg-green-100 text-green-700 rounded-lg">
                    {{Session::get('success')}}
                </div>
            </section>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                @foreach($listings as $listing)
                <div class="rounded-lg shadow-md bg-white">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">{{ $listing->title }}</h2>
                        <p class="text-gray-700 text-lg mt-2">
                            {{ $listing->description }}
                        </p>
                        <ul class="my-4 bg-gray-100 p-4 rounded">
                            <li class="mb-2"><strong>Salary:</strong>{{ $listing->salary }}</li>
                            <li class="mb-2">
                                <strong>Location:</strong> {{ $listing->city }}, {{ $listing->state }}
                                <span class="text-xs bg-blue-500 text-white rounded-full px-2 py-1 ml-2">Local</span>
                            </li>
                            <?php if (!empty($listing->tags)) : ?>
                                <li class="mb-2">
                                    <strong>Tags:</strong> <span>{{ $listing->tags }}</span>,
                                </li>
                            <?php endif; ?>
                        </ul>
                        <a href="{{ route('listings.show', $listing) }}" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                            Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <tfoot>
        <tr>
            <td colspan="4" class="py-1 px-2 bg-gray-200 dark:bg-gray-700
                                border border-transparent border-t-gray-500">
                @if($listings->hasPages())
                {{ $listings->links() }}
                @else
                <small>No pages</small>
                @endif
            </td>
        </tr>
    </tfoot>

    </section>
</x-app-layout>