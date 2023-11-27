<script src="https://cdn.tailwindcss.com"></script>
<div class="bg-white border border-4 rounded-lg shadow relative m-10">

    <div class="flex items-start justify-between p-5 border-b rounded-t">
        <h3 class="text-xl font-semibold">
            Ajouter un bien
        </h3>
        <a href="/back"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
            data-modal-toggle="product-modal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>

    <div class="p-6 space-y-6">
        <form action="/update/bien/{{ $bien->id }}" method="Post">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">Nom Bien</label>
                    <input type="text" name="nombien" id="product-name" value="{{ $bien->nom }}"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                        placeholder="Chambre" required="">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="text-sm font-medium text-gray-900 block mb-2">Categorie Bien</label>
                    <select name="categori" id="category"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                        required="">
                        <option value="">{{ $bien->categorie }}</option>
                        <option value="luxe">Luxieuse</option>
                        <option value="moyen">Moyen</option>
                    </select>

                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Status</label>
                    <select name="status" id="category"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                        required="">
                        <option value="">{{ $bien->statu }}/</option>
                        <option value="occupe">Occupé</option>
                        <option value="disponible">Disponible</option>
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Adress</label>
                    <input type="text" name="adresse" id="price" value="{{ $bien->adresse }}"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                        placeholder="$2300" required="">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Image</label>
                    <input type="file" name="image" id="price"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                        placeholder="$2300" required="" value="{{ $bien->image }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Date publication</label>
                    <input type="date" name="datepub" id="price" value="{{ $bien->datePublication }}"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                        placeholder="$2300" required="">
                </div>
                <div class="col-span-full">
                    <label for="product-details"
                        class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                    <textarea id="product-details" rows="6"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4"
                        placeholder="Details" name="description" ">{{ $bien->description }}</textarea>
                </div>
            </div>


            <div class="p-6
                        border-t border-gray-200 rounded-b">
                <button
                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    type="submit">Modifier</button>
            </div>
        </form>
    </div>
</div>
