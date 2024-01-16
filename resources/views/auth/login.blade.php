@extends('base')
@section('title', 'Login')
@section('content')
    <h1>Se Connecter</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @error('email') {{ $message }} @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password') {{ $message }} @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Se connecter </button>
                </div>
            </form>
        </div>
    </div>
@endsection
