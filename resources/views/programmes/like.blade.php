
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
{{--    <div>--}}
{{--        <form class="like-form" method="post" action="{{ route('programme.like',  ['programme' => $programme]) }}" >--}}
{{--            @csrf--}}
{{--            <button type="submit" class="like-dislike liking">--}}
{{--                <span   class="like">&#128077;</span>--}}
{{--                <span> {{ $programme->likes()->count() }}</span>--}}
{{--            </button>--}}
{{--        </form>--}}
{{--        <form class="like-form" method="post" action="{{ route('programme.unlike',  ['programme' => $programme]) }}" >--}}
{{--            @csrf--}}
{{--            <button type="submit" class="like-dislike not-liking">--}}
{{--                <span class="dislike">&#128078;</span>--}}
{{--            </button>--}}
{{--        </form>--}}
{{--    </div>--}}

    <div class="d-flex">
        <form class="like-form" method="post" action="{{ route('programme.like', ['programme' => $programme]) }}">
            @csrf
            <button type="submit" class="btn btn-primary like-dislike liking">
                <span class="like">&#128077;</span>
                <span>{{ $programme->likes()->count() }}</span>
            </button>
        </form>
        <form class="like-form" method="post" action="{{ route('programme.unlike', ['programme' => $programme]) }}">
            @csrf
            <button type="submit" class="btn btn-danger like-dislike not-liking">
                <span class="dislike">&#128078;</span>
            </button>
        </form>
    </div>





