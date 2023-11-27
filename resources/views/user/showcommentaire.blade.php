<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{ $commentaire->auteur }}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $commentaire->dateCommentaire }}</h6>
        <p class="card-text">{{ $commentaire->contenu }}</p>
        <a href="/commentaire/modifier/{{ Auth::User()->id }}/{{ $commentaire->id }}"
            class="btn btn-primary">Modifier</a>
        <a href="/commentaire/suppression/{{ Auth::User()->id }}/{{ $commentaire->id }}"
            class="btn btn-danger">Supprimer</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
