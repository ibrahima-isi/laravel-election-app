@extends('base')
@section('title', 'Candidats')

@section('content')
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    @if(auth()->check() && auth()->user()->role == 'admin'))
        <div class="align-in-row">
            <h1 class="h1 border-3">La liste des candidats</h1>
            <a class="btn-lg btn btn-primary" href="{{ route('addCandidat')}}">Ajouter</a>
        </div>
    @endif

{{--    <table class="table table-primary table-striped table-hover table-bordered border-light">--}}
{{--        <caption>Liste des candidats</caption>--}}
{{--        <thead class="table-dark">--}}
{{--            <tr>--}}
{{--                <th>ID</th>--}}
{{--                <th>Photo</th>--}}
{{--                <th>Nom</th>--}}
{{--                <th>Prenom</th>--}}
{{--                <th>Parti</th>--}}
{{--                <th>Biographie</th>--}}
{{--                <th>Validation</th>--}}
{{--            </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--            @foreach($candidats as $candidat)--}}
{{--                <tr>--}}
{{--                    <td>{{ strtoupper($candidat->id) }}</td>--}}
{{--                    <td>{{ strtoupper( $candidat->photo) }}</td>--}}
{{--                    <td>{{ strtoupper($candidat->nom) }}</td>--}}
{{--                    <td>{{ strtoupper($candidat->prenom) }}</td>--}}
{{--                    <td>{{ strtoupper($candidat->parti) }}</td>--}}
{{--                    <td>{{ $candidat->biographie }}</td>--}}
{{--                    <td>{{ $candidat->validation }}</td>--}}

{{--                </tr>--}}
{{--            @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
    @foreach($candidats as $candidat)
        <section>
            <h1 >{{ $candidat->nom .' '.$candidat->prenom }}</h1>
            @if( $candidat->photo)
                <div class="card-img">
                    <img src="/storage/{{ $candidat->photo }}" alt="Photo du candidat" style="width:80%;height:630px;">
                </div>
            @endif

            <h2>Parti : {{ $candidat->parti }}</h2>
             @if ($candidat->biographie)
                    <h4>Biographie :</h4>
                    {{ $candidat->biographie}}
                    {{ $candidat->biographie}}
            @else
                    <p>Pas de Biographie pour ce candidat.</p>
            @endif
            @if ($candidat->programmes)
                <h4>Programme:</h4>
                <h6>
                    {{ $candidat->programmes->titre }}
                </h6>
                <p>
                    {{ $candidat->programmes->contenu }}
                </p>
                @php
                    $pro = \App\Models\Programme::find($candidat->programmes->id);
                    $secteurs = $pro->secteurs;

                @endphp
                @if(!$secteurs->isEmpty())
                    <h6>Secteurs : </h6>
                    @foreach ($secteurs as $secteur)
                        <div class="btn btn-secondary" >
                            {{ $secteur->libelle.'  ' }}
                        </div>
                    @endforeach
                @endif
            @else
                <p>No programme associated with this candidat.</p>
            @endif
            @if(auth()->check() && auth()->user()->role == 'admin'))
                <a href="{{ route('editCandidat', [$candidat]) }}" class="btn btn-info ">✍</a>
                <a href="{{ route('editCandidat', [$candidat]) }}" class="btn btn-danger">⌫</a>
            @endif
        </section>
    @endforeach
    <p>{{ $candidats->links() }}</p>

@endsection
