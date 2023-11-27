<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body class="antialiased">
    <section class="bg-white py-20">
        <script src="https://cdn.tailwindcss.com"></script>
        <div class="font-sans leading-normal tracking-normal">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        @if (Auth::User()->role == 'admin')
                            <a href="{{ url('/dashboard/admin') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ url('/dashboard') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <!-- Hero section -->

            <div class="container mx-auto px-4">
                <div class="max-w-2xl mx-auto text-center">
                    <h1 class="text-4xl font-bold mb-6">We're launching soon</h1>
                    <p class="text-gray-600 mb-12">Enter your email to be the first to know when we launch.</p>
                    <form class="max-w-md mx-auto">
                        <div class="flex items-center">
                            <input type="email"
                                class="bg-gray-100 mr-3 py-2 px-4 w-full rounded-md focus:outline-none focus:bg-white"
                                placeholder="Enter your email">
                            <button type="submit"
                                class="bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>

    <!-- Features section -->
    <section class="bg-gray-200 py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">Nos Biens</h2>
                <p class="text-gray-600 mb-12">Cette propriété luxueuse offre une expérience de vie inégalée avec
                    un design impressionnant. C'est une occasion unique d'acquérir une maison élégante et
                    fonctionnelle, proche des commodités de la ville.
                </p>
            </div>

            <div class="col">
                @foreach ($biens as $bien)
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div class="rounded-md bg-white shadow-md p-8">

                            <div class="flex flex-wrap">
                                <div class="text-4xl font-bold text-purple-600 mb-4">{{ $bien->nom }}</div>

                                <div><img src="{{ asset('images/' . $bien->image) }}" alt="" width="70%"> </div>
                                <h3 class="text-2xl font-bold mb-4">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $bien->statu }}</span>

                                </h3>

                                <p class="text-gray-600 mb-4">{{ $bien->description }}</p>
                                <div style="margin-left: 90%">
                                    <a href="/commentaire/{{ $bien->id }}"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                        data-modal-toggle="product-modal">
                                        @php
                                            $nbr = 0;
                                        @endphp
                                        @foreach ($Commentaires as $comm)
                                            @if ($bien->id == $comm->bien_id)
                                                @php
                                                    $nbr++;
                                                @endphp
                                            @endif
                                        @endforeach

                                        {{ $nbr }}<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 5a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2h-2l-4 4v-4H4a2 2 0 01-2-2V5z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>


                        </div>

                    </div>
                @endforeach
            </div>



        </div>
        </div>
    </section>
    </div>

</body>

</html>
