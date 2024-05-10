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
                {{ __('Edit User') }}
            </h2>
        </header>
        <section
            class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-800 dark:text-gray-300
                   p-4 overflow-hidden shadow-sm rounded-lg ">

            <form class="flex flex-col gap-2"
                  action="{{ route('welcome', $user) }}"
                  method="POST">

                @CSRF
                @method( '' )

                <fieldset class="flex flex-row">
                    <label class="w-24 text-gray-500">
                        Name
                    </label>
                    <input type="text" class="grow rounded-md border-gray-200  "
                           d="Name"
                           value="{{ old('name') ?? $user->name }}"
                           placeholder="Name..."/>
                </fieldset>
                <fieldset class="flex flex-row">
                    <label class="w-24 text-gray-500" for="Email">
                        Email
                    </label>
                    <input type="text" class="grow rounded-md border-gray-200"
                           id="Email"
                           name="email"
                           value="{{ old('email') ?? $user->email }}"
                           placeholder="Email..."/>
                </fieldset>
                <fieldset class="flex flex-row">
                    <label class="w-24 text-gray-500" for="Password">
                        Password
                    </label>
                    <input type="text" class="grow rounded-md border-gray-200 "
                           id="Password"
                           name="password"
                           placeholder="Password..."/>
                </fieldset>
                <fieldset class="flex flex-row">
                    <label class="w-24 text-gray-500" for="PasswordConfirmation">
                        {{ __('Confirm Password') }}
                    </label>
                    <input type="text" class="grow rounded-md border-gray-200 "
                           id="PasswordConfirmation"
                           name="password_confirmation"
                           placeholder="Confirm Password..."/>
                </fieldset>
                <fieldset class="flex flex-row fl">
                    <label class="w-24 text-gray-500" for="Status">
                        {{ __('Status') }}
                    </label>
                    <select name="status" id="Status" class="grow rounded-md border-gray-200 ">
                        <option value="" selected disabled>Please select an option...</option>
                        @foreach(\App\Enums\UserStatus::cases() as $status)
                            <option value="{{ $status->name }}"
                                {{ $status->value == (old('status') ?? $user->status) ? "selected":"" }}>
                                {{ $status->value }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>
                <fieldset class="flex flex-row gap-4 ">
                    <label class="w-24 text-gray-500">
                        <span class="sr-only">Form actions:</span>
                    </label>
                    <button type="cancel"
                            class="p-2 px-4 -ml-4 text-center rounded-md
                                      text-green-600 hover:text-green-200 dark:hover:text-black bg-green-200 dark:bg-black hover:bg-green-500
                                      duration-300 ease-in-out transition-all">
                        <i class="fa fa-pen text-lg"></i>
                        {{ __('Save User') }}
                    </button>

                    <a href="{{ route('welcome') }}"
                       class="p-2 px-4 text-center rounded-md
                                      text-blue-600 hover:text-blue-200 dark:hover:text-black bg-blue-200 dark:bg-black hover:bg-blue-500
                                      duration-300 ease-in-out transition-all">
                        <i class="fa fa-list text-lg"></i>
                        {{ __('User List') }}
                    </a>
                </fieldset>
            </form>


        </section>

    </article>

</x-app-layout>
