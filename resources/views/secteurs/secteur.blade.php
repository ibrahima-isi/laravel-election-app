@extends('base')
@section('title', 'Secteurs')

@section('content')
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    @if(auth()->check() && auth()->user()->role == 'admin')
        <div class="align-in-row">
            <h1 class="h1 border-3">La liste des secteurs</h1>
            <a class="btn-lg btn btn-primary" href="{{ route('addSecteur')}}">Ajouter</a>
        </div>
    @endif
<table class="table table-primary table-striped table-hover table-bordered border-light">
    <caption>Liste des secteurs</caption>
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Libelle</th>
            <th>Couleur</th>
            <th>Icon</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($secteurs as $secteur)
            <tr>
                <td>{{ strtoupper($secteur->id) }}</td>
                <td>{{ strtoupper( $secteur->libelle) }}</td>
                <td>{{ strtoupper($secteur->couleur) }}</td>
                <td>{{ strtoupper($secteur->icon) }}</td>
                <td class="d-flex justify-content-end">
                    <a href="{{ route('editSecteur', [$secteur]) }}" class="btn btn-info ">✍</a>
                    <a href="{{ route('editSecteur', [$secteur]) }}" class="btn btn-danger">⌫</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
