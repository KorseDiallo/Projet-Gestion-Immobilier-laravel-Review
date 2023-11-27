
<script src="https://cdn.tailwindcss.com"></script>
<div class="h-full bg-gray-400 dark:bg-gray-900">
    <!-- Container -->
    <div class="mx-auto">
        <div class="flex justify-center px-6 py-12">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div class="w-full h-auto bg-gray-400 dark:bg-gray-800 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                    style="background-image: url('https://source.unsplash.com/Mv9hjnEUHR4/600x800')"></div>
                <!-- Col -->
                <div class="w-full lg:w-7/12 bg-white dark:bg-gray-700 p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="py-4 text-2xl text-center text-gray-800 dark:text-white">Create an Account!</h3>
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white dark:bg-gray-800 rounded" method="POST"
                        action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white"
                                    for="firstName">
                                    First Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 dark:text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="firstname" type="text" placeholder="First Name" name="firstname" />
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white"
                                    for="lastName">
                                    Last Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 dark:text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="lastName" type="text" placeholder="Last Name" name="lastname" />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 dark:text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email" type="email" placeholder="Email" name="email" />
                        </div>
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white"
                                    for="password">
                                    Password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 dark:text-white border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="password" type="password" placeholder="******************" name="password" />
                                <p class="text-xs italic text-red-500">Please choose a password.</p>
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white"
                                    for="c_password" name="password">
                                    Confirm Password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 dark:text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="c_password" type="password" placeholder="******************"
                                    name="password_confirmation" />
                            </div>
                        </div>
                        <div class="mb-6 text-center">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                        <hr class="mb-6 border-t" />
                        <div class="text-center">
                            <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="{{ route('login') }}">
                                Already have an account? Login!
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
