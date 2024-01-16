@extends('base')
@section('title', 'Electeurs')

@section('content')
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="align-in-row">
        <h1 class="h1 border-3">La liste des electeurs</h1>
        <a class="btn-lg btn btn-primary" href="{{ route('addElecteur')}}">Ajouter</a>
    </div>
    <table class="table table-primary table-striped table-hover table-bordered border-light">
        <caption>Liste des electeurs</caption>
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>CNI</th>
                <th>adresse</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($electeurs as $electeur)
                <tr>
                    <td>{{ strtoupper($electeur->id) }}</td>
                    <td>{{ strtoupper($electeur->nom) }}</td>
                    <td>{{ strtoupper($electeur->prenom) }}</td>
                    <td>
                        <img src="/storage/{{ $electeur->cni }}" alt="carte ID" >
                    </td>
                    <td>{{ strtoupper($electeur->adresse) }}</td>
                    <td class="d-flex justify-content-end">
                        <a href="{{ route('editElecteur', [$electeur]) }}" class="btn btn-info ">✍</a>
                        <a href="{{ route('editElecteur', [$electeur]) }}" class="btn btn-danger">⌫</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
