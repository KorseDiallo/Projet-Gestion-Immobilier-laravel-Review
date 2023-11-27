<script src="https://cdn.tailwindcss.com"></script>
<!-- component -->
<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="./tailwind.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <title>Chi Desk</title>
    <style>
        html {
            font-size: 14px;
            line-height: 1.285;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
                Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Arial,
                sans-serif;
        }

        html,
        body {
            width: 100%;
            height: 100%;
        }

        /* can be configured in tailwind.config.js */
        .group:hover .group-hover\:block {
            display: block;
        }

        .focus\:cursor-text:focus {
            cursor: text;
        }

        .focus\:w-64:focus {
            width: 16rem;
        }

        /* zendesk styles */
        .h-16 {
            height: 50px;
        }

        .bg-teal-900 {
            background: #03363d;
        }

        .bg-gray-100 {
            background: #f8f9f9;
        }

        .hover\:border-green-500:hover {
            border-color: #78a300;
        }
    </style>
</head>

<body class="antialiased h-full">
    <!-- you can clone or fork the repo if you want -->
    <!-- https://github.com/bluebrown/tailwind-zendesk-clone   -->

    <div class="h-full w-full flex overflow-hidden antialiased text-gray-800 bg-white">
        <!-- section body side nav -->

        <div class="flex-1 flex flex-col">


            <!-- section body header -->


            <nav class="relative flex items-center justify-between sm:h-10 md:justify-center py-6 px-4 mt-2">
                <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                    <div class="flex items-center justify-between w-full md:w-auto">
                        <a href="" aria-label="Home">
                            <img src="https://www.svgrepo.com/show/491978/gas-costs.svg" height="40"
                                width="40" />
                        </a>
                        <div class="-mr-2 flex items-center md:hidden">
                            <button type="button" id="main-menu" aria-label="Main menu" aria-haspopup="true"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="hidden md:flex md:space-x-10">
                    <a href=""
                        class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Acceuil</a>
                    <a href="#pricing"
                        class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Lister
                        Bien</a>
                    <a href="{{ route('admin.ajoutbien') }}"
                        class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Ajouter
                        Bien</a>

                </div>
                <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">

                    <div class="dropdown">
                        <a class="btn btn-success dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Admin/{{ Auth::User()->firstname }}__{{ Auth::User()->name }}
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profile">Voir profil</a></li>

                        </ul>
                    </div>
                    <span class="inline-flex rounded-md shadow ml-2">
                        <a href="{{ route('logout') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 transition duration-150 ease-in-out">
                            Log Out
                        </a>
                    </span>
                </div>
            </nav>
            <!-- main content -->
            <br>
            <br>
            <main class="flex-grow flex min-h-0 border-t">
                <div class="w-full p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Categorie</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    description</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    image</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Adresse</th>
                                <th <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                       
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($biens as $bien)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $bien->nom }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $bien->categorie }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">


                                        {{ Str::words($bien->description, $words = 10, $end = '...') }}

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap"><img
                                            src="{{ asset('images/' . $bien->image) }}" alt="" width="50px">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $bien->adresse }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $bien->statu }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/detail/produit/{{ $bien->id }}"
                                            class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Voir
                                            Details</a>
                                        <a href="/delete/produit/{{ $bien->id }}"
                                            class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</a>
                                        <a href="/ajoutImage/{{ $bien->id }}"
                                            class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Ajout Images Chambres</a>    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      
                    </table>
                </div>
                <i class="fa-solid fa-comment-dots"></i>
                <!-- section content -->
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
                </script>
