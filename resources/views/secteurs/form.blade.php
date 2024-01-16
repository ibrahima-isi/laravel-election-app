@extends('base')
@section('title', 'Ajouter Un Secteur')

@section('content')
    <h1 class="m-5">
        @if($secteur->id)
            Modifier Secteur
        @else
            Ajouter un secteur
        @endif
    </h1>
    <form class="m-5 border border-secondary" method="post" action="" enctype="multipart/form-data">
        @csrf
        <fieldset class="p-2 border m-4">
            <legend class="w-auto">Infos du Secteur</legend>
            <div class="mb-3">
                <label for="libelle" class="form-label">libelle</label>
                <input type="text" class="form-control" id="libelle" aria-describedby="nameHelp" name="libelle">
                @error('libelle') {{ $message }} @enderror

            </div>
            <div class="mb-3">
                <label for="couleur" class="form-label">couleur</label>
                <input type="text" class="form-control" id="couleur" name="couleur" >
                @error('couleur') {{ $message }} @enderror

            </div>
            <div class="mb-3">
                <label for="icon" class="form-label">icon</label>
                <input class="form-control form-control-lg" type="file" id="icon" name="icon">
                @error('icon') {{ $message }} @enderror

            </div>
            <button type="submit" class="btn btn-primary">
                @if($secteur->id)
                    Modifier
                @else
                    Ajouter
                @endif
            </button>
        </fieldset>
    </form>
@endsection
