@extends('base')
@section('title', 'Register')
@section('content')
    <h1>Inscription </h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('auth.register') }}" method="post" class="vstack gap-3">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @error('name') {{ $message }} @enderror
                </div>
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
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="">Selectionner son role</option>
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
                    @error('role') {{ $message }} @enderror
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary">S'inscrire </button>
                </div>
            </form>
        </div>
    </div>
@endsection
