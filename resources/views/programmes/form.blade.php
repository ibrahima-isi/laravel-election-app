@extends('base')
@section('title', 'Ajouter Un Programme')

@section('content')
    <h1 class="m-5">
        @if($programme->id)
            Modifier Programme
        @else
            Ajouter Un Programme
        @endif
    </h1>
    <form class="m-5 border border-secondary" method="post" action="" enctype="multipart/form-data">
        @csrf
        <fieldset class="p-2 border m-4">
            <legend class="w-auto">Infos du programmes</legend>
            <div class="mb-3">
                <label for="titre" class="form-label">titre</label>
                <input type="text" class="form-control" id="titre" aria-describedby="nameHelp" name="titre" value="{{ old('titre', $programme->titre) }}">
                @error('titre') {{ $message }} @enderror

            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label">contenu</label>
                <input type="text" class="form-control" id="contenu" name="contenu" value="{{ old('titre', $programme->contenu) }}">
                @error('contenu') {{ $message }} @enderror

            </div>
            <div class="mb-3">
                <label for="document" class="form-label">document</label>
                <input class="form-control form-control-lg" type="text" id="document" name="document" value="{{ old('titre', $programme->document) }}">
                @error('document') {{ $message }} @enderror

            </div>
        </fieldset>
        <fieldset class="border p-2 m-4">
            <legend class="w-auto">Details</legend>
            <div class="mb-3">
                <label for="delais" class="form-label">delais</label>
                <input type="date" class="form-control" id="delais" name="delais" value="{{ old('titre', $programme->delais) }}">
                @error('delais') {{ $message }} @enderror

            </div>
            <button type="submit" class="btn btn-primary">
                @if($programme->id)
                    Modifier
                @else
                    Ajouter
                @endif
            </button>
        </fieldset>
    </form>
@endsection
