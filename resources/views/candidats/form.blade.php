 <h1 class="m-5">
        @if($candidat->id)
            Modifier Candidat
        @else
            Ajouter Un candidat
        @endif
    </h1>
    <form class="m-5 border border-secondary" method="post" action="" enctype="multipart/form-data">
        @csrf
        <fieldset class="p-2 border m-4">
            <legend class="w-auto">Infos du candidat</legend>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" aria-describedby="nameHelp" name="nom" value="{{ old('nom',$candidat->nom) }}">
                @error('nom') {{ $message }} @enderror
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom"  value="{{ old('prenom', $candidat->prenom)}}">
                @error('prenom') {{ $message }} @enderror

            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input class="form-control form-control-lg" type="file" id="photo" name="photo">
                @error('photo') {{ $message }} @enderror

            </div>
        </fieldset>
        <fieldset class="border p-2 m-4">
            <legend class="w-auto">Details</legend>
            <div class="mb-3">
                <label for="parti" class="form-label">Parti</label>
                <input type="text" class="form-control" id="parti" name="parti"  value="{{ old('parti', $candidat->parti) }}">
                @error('parti') {{ $message }} @enderror

            </div>
            <div class="mb-3">
                <label for="biographie" class="form-label">Biographie</label>
                <textarea type="text" class="form-control" id="biographie" name="biographie" rows="5">{{ old('parti', $candidat->biographie) }}</textarea>
                @error('biographie') {{ $message }} @enderror

            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="validation" name="validation" value="{{ old('validation', $candidat->validation) }}">
                <label class="form-check-label" for="validation">Valider le candidat</label>
                @error('validation') {{ $message }} @enderror

            </div>
            <button type="submit" class="btn btn-primary">
                @if($candidat->id)
                    Modifier
                @else
                    Ajouter
                @endif
            </button>
        </fieldset>
    </form>

