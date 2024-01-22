@extends('base')
@section('title', 'Programmes')

@section('content')
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif
    @if(auth()->check() && auth()->user()->role == 'admin')
        <div class="align-in-row">
            <h1 class="h1 border-3">Liste des programmes</h1>

            <a class="btn-lg btn btn-primary" href="{{ route('addProgramme')}}">Ajouter</a>
        </div>
    @endif

    @foreach($programmes as $programme)
        <h1>{{ $programme->titre }}</h1>
        @if($programme->candidat )
            <h4> par {{ $programme->candidat?->nom.' '. $programme->candidat?->prenom }}</h4>
        @endif
        @php
           $secteurs = $programme->secteurs
        @endphp
        @foreach($secteurs as $secteur)
            <h5>
                {{ $secteur?->libelle }}
            </h5>
        @endforeach
        <p>
            {{ $programme->contenu }}
        </p>
        @if(auth()->check() && auth()->user()->role == 'admin')
            <a href="{{ route('edit-programme', [$programme]) }}" class="btn btn-info ">Modifier✍</a>
            <form action="{{ route('delete.programme', [$programme]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit"  class="btn btn-danger">Supprimer ⌫</button>
            </form>
        @endif
        @include('programmes.like')
    @endforeach
@endsection
