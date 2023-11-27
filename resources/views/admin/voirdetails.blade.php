<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="bg-gray-100 dark:bg-gray-800 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                    <img class="w-full h-full object-cover" src="{{ asset('images/' . $biens->image) }}" alt="Product Image">
                </div>
                <div class="flex -mx-2 mb-4">
                    <div class="w-1/2 px-2">
                        <a href="/modifier/produit/{{ $biens->id }}" class="w-full bg-green-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700" name="modifer">modifier les informations</a>
                    </div>
                    <div class="w-1/2 px-2">
                        <a href="" class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">Voir
                            Commentaires</a>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <div style="margin-left:90%">
                    <a href="/back" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{ $biens->nom }}</h2>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Prix:</span>
                        <span class="text-gray-600 dark:text-gray-300">$29.99</span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Status:</span>
                        <span class="text-gray-600 dark:text-gray-300">{{ $biens->statu }}</span>
                    </div>
                </div>


                <div>
                    <span class="font-bold text-gray-700 dark:text-gray-300">Product Description:</span>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                        {{ $biens->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <!--  -->
  
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
     
        <div class="carousel-inner">
        @foreach($chambres as $key => $chambre)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img class="d-block w-100 img-fluid" src="{{asset('images/'.$chambre->image)}}" alt="First slide" >
            </div>
        @endforeach
        </div>
      
    </div>

    <!--  -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Auteur</th>
                <th scope="col">Description</th>
                <th scope="col">Date Commentaire</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            @foreach ($Commentaires as $commentaire)
            <tr>
                <th scope="row">{{ $commentaire->auteur }}</th>
                <td>{{ $commentaire->contenu }}</td>
                <td>{{ $commentaire->dateCommentaire }}</td>
                <td><a href="/commentaire/admin/suppression/{{ $commentaire->id }}" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</div>