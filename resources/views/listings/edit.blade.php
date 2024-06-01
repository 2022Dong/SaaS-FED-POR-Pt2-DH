<x-app-layout>
    <article class="container mx-auto max-w-7xl">
        <section class="flex justify-center items-center mt-20">
            <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-600 mx-6">
                <h2 class="text-4xl text-center font-bold mb-4">Edit Job Listing</h2>
                <form method="POST" action="{{ route('listings.update', $listing) }}">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="_method" value="PUT">
                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                        Job Info
                    </h2>
                    @if(Session::has('success'))
                    <section id="Messages" class="my-4 px-4">
                        <div class="p-4 border-green-500 bg-green-100 text-green-700 rounded-lg">
                            {{Session::get('success')}}
                        </div>
                    </section>
                    @endif

                    @if($errors->count()>0)
                    <section class="bg-red-200 text-red-800 mx-4 my-2 px-4 py-2 flex flex-col gap-1 rounded border-red-600">
                        <p>We have noted some data entry issues, please update and resubmit.</p>
                        {{-- @foreach($errors->all() as $error)--}}
                        {{-- <p class="text-sm">{{ $error }}</p>--}}
                        {{-- @endforeach--}}
                    </section>
                    @endif
                    <div class="mb-4">
                        <input type="text" name="title" placeholder="Job Title" class="w-full px-4 py-2 border rounded focus:outline-none" value="{{ old('title') ?? $listing->title }}" />
                    </div>
                    <div class="mb-4">
                        <textarea name="description" placeholder="Job Description" class="w-full px-4 py-2 border rounded focus:outline-none">{{ old('description') ?? $listing->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <input type="text" name="salary" placeholder="Annual Salary" class="w-full px-4 py-2 border rounded focus:outline-none" value="{{ old('salary') ?? $listing->salary }}" />
                    </div>
                    <div class="mb-4">
                        <input type="text" name="requirements" placeholder="Requirements" class="w-full px-4 py-2 border rounded focus:outline-none" value="{{ old('requirements') ?? $listing->requirements }}" />
                    </div>
                    <div class="mb-4">
                        <input type="text" name="benefits" placeholder="Benefits" class="w-full px-4 py-2 border rounded focus:outline-none" value="{{ old('benefits') ?? $listing->benefits }}" />
                    </div>
                    <div class="mb-4">
                        <input type="text" name="tags" placeholder="tags" class="w-full px-4 py-2 border rounded focus:outline-none" value="{{ old('tags') ?? $listing->tags }}" />
                    </div>
                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                        Company Info & Location
                    </h2>
                    <div class="mb-4">
                        <input type="text" name="company" placeholder="Company Name" class="w-full px-4 py-2 border rounded focus:outline-none" value="{{ old('company') ?? $listing->company }}" />
                    </div>
                    <div class="mb-4">
                        <input type="text" name="address" placeholder="Address" class="w-full px-4 py-2 border rounded focus:outline-none" value="{{ old('address') ?? $listing->address }}" />
                    </div>
                    <div class="mb-4">
                        <input type="text" name="city" placeholder="City" class="w-full px-4 py-2 border rounded focus:outline-none" value="{{ old('city') ?? $listing->city }}" />
                    </div>
                    <div class="mb-4">
                        <input type="text" name="state" placeholder="State" class="w-full px-4 py-2 border rounded focus:outline-none" value="{{ old('state') ?? $listing->state }}" />
                    </div>
                    <div class="mb-4">
                        <input type="text" name="phone" placeholder="Phone" class="w-full px-4 py-2 border rounded focus:outline-none" value="{{ old('phone') ?? $listing->phone }}" />
                    </div>
                    <div class="mb-4">
                        <input type="email" name="email" placeholder="Email Address For Applications" class="w-full px-4 py-2 border rounded focus:outline-none" value="{{ old('email') ?? $listing->email }}" />
                    </div>
                    <button class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                        Save
                    </button>
                    <a href="{{ route('listings.show', $listing) }}" class="block text-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded focus:outline-none">
                        Cancel
                    </a>
                </form>
            </div>
        </section>
    </article>
</x-app-layout>