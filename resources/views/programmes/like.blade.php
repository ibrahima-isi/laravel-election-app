@extends('base')

@section('title', 'like')
@section('content')
    <style>
        .like-dislike {
            font-size: 24px; /* Ajustez la taille selon vos besoins */
        }

        .like, .dislike {
            display: inline-block;
            margin-right: 10px; /* Espacement entre les symboles */
            cursor: pointer;
        }
    </style>
    <form class="" method="post" action="{{ route('programme.like',  ['programme' => $programme]) }}" >
        @csrf
        <button type="submit" class="like-dislike">
            <span   class="like">&#128077;</span>
            <span> {{ $programme->likes()->count() }}</span>
{{--            <span class="dislike">&#128078;</span>--}}
{{--            <span> {{ $programme->unlikes()->count() }}</span>--}}
        </button>
    </form>
@endsection
