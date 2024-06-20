<footer class="w-full bg-gray-800 text-gray-500 p-8">
    @can('listing-add')
    <div class="container mx-auto my-6 bg-blue-800 text-white rounded p-4 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold">Looking to hire?</h2>
            <p class="text-gray-200 text-lg mt-2">
                Post your job listing now and find the perfect candidate.
            </p>
        </div>
        @can('listing-add')
        <div class="flex">
            <x-responsive-nav-link :href="route('listings.create')" :active="request()->routeIs('listings.*')" class="ml-6 px-4 rounded-md py-2
                      text-black bg-yellow-400 shadow shadow-black/70
                      hover:text-yellow-300 hover:bg-yellow-600 hover:shadow-none
                      transition duration-300 h-10">
                <i class="fa fa-edit mr-2"></i> {{ __('Post a Job') }}
            </x-responsive-nav-link>
        </div>
        @endcan
    </div>
    @endcan

    <div class="container p-4 mx-auto flex flex-col xl:flex-row items-start xl:items-center
                justify-start xl:justify-between text-sm gap-2 sm:gap-0.5">
        <section class="flex flex-row gap-2 items-center h-8 md:h-12">
            <x-application-logo class='w-8 md:w-12 text-white' />
            <h5 class="text-md">Workopia</h5>
        </section>

        <section id="copyright">
            <p>
                &copy; Copyright 2024, All rights reserved Dongyun Huang, Traversy Media &amp; Adrian Gould
            </p>
        </section>

        <section id="footerNav" class="flex flex-col sm:flex-row gap-1 -ml-1">
            <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')" class="group">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('listings.index')" :active="request()->routeIs('listings.*')" class="group">
                {{ __('Listings') }}
            </x-nav-link>
            @can('listing-edit')
            <x-nav-link :href="route('listings.admin-index')" :active="request()->routeIs('listings.admin-index')" class="group">
                {{ __('Manage Listings') }}
            </x-nav-link>
            @endcan
            <x-nav-link :href="route('pricing')" :active="request()->routeIs('/')" class="group">
                {{ __('Pricing') }}
            </x-nav-link>
            @can('user-browse')
            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')" class="group">
                {{ __('Users') }}
            </x-nav-link>
            @endcan
            @can('role-assign')
            <x-nav-link :href="route('admin.permissions')" :active="request()->routeIs('admin.*')" class="group">
                {{ __('Roles') }}
            </x-nav-link>
            @endcan
            <x-nav-link :href="route('about')" :active="request()->routeIs('/')" class="group">
                {{ __('About') }}
            </x-nav-link>
            <x-nav-link :href="route('contact')" :active="request()->routeIs('/')" class="group">
                {{ __('Contact Us') }}
            </x-nav-link>
        </section>
    </div>
</footer>


@include('layouts.dev-mode')