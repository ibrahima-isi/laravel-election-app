@extends('base')
@section('title', 'Programmes')

@section('content')
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="align-in-row">
        <h1 class="h1 border-3">Liste des programmes</h1>
        <a class="btn-lg btn btn-primary" href="{{ route('addProgramme')}}">Ajouter</a>
    </div>
    <table class="table table-primary table-striped table-hover table-bordered border-light">
        <caption>Liste des programmes</caption>
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>titre</th>
                <th>contenu</th>
                <th>document</th>
                <th>Candidat titulaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programmes as $programme)
                <tr>
                    <td>{{ strtoupper($programme->id) }}</td>
                    <td>{{ strtoupper( $programme->titre) }}</td>
                    <td>{{ strtoupper($programme->contenu) }}</td>
                    <td>{{ strtoupper($programme->document) }}</td>
                    <td>{{ strtoupper($programme->candidat?->nom.' '.$programme->candidat?->prenom) }}</td>
                    <td>{{ strtoupper($programme->candidat?->nom.' '.$programme->candidat?->prenom) }}</td>

                    <td class="d-flex justify-content-end">
                        <a href="{{ route('editProgramme', [$programme]) }}" class="btn btn-info ">✍</a>
                        <a href="{{ route('editProgramme', [$programme]) }}" class="btn btn-danger">⌫</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
