<h1 class="m-5">
    @if($electeur->id)
        Modifier electeur
    @else
        Ajouter electeur
    @endif
</h1>
<form class="m-5 border border-secondary" method="post" action="" enctype="multipart/form-data">
    @csrf
    <fieldset class="p-2 border m-4">
        <legend class="w-auto">Infos de l'electeur</legend>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" aria-describedby="nameHelp" name="nom" value="{{ old('nom', $electeur->nom) }}">
            @error('nom') {{ $message }} @enderror

        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('nom', $electeur->prenom) }}">
            @error('prenom') {{ $message }} @enderror

        </div>
        <div class="mb-3">
            <label for="cni" class="form-label">CNI</label>
            <input class="form-control form-control-lg" type="file" id="cni" name="cni" value="{{ old('nom', $electeur->CNI) }}">
            @error('cni') {{ $message }} @enderror

        </div>
    </fieldset>
    <fieldset class="border p-2 m-4">
        <legend class="w-auto">Details</legend>
        <div class="mb-3">
            <label for="adresse" class="form-label">adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('nom', $electeur->adresse) }}" >
            @error('adresse') {{ $message }} @enderror

        </div>
        <button type="submit" class="btn btn-primary">
            @if($electeur->id)
                Modifier
            @else
                Ajouter
            @endif
        </button>
    </fieldset>
</form>
