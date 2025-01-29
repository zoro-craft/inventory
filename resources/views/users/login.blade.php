@extends('template')
@section('titre', 'login')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('logout_message'))
        <div class="alert alert-success">
            {{ session('logout_message') }}
        </div>
    @endif
    @if (session('error_login'))
        <div class="alert alert-danger">
            {{ session('error_login') }}
        </div>
    @endif
    @if (session('access_denied'))
        <div class="alert alert-danger">
            {{ session('access_denied') }}
        </div>
    @endif
    <!-- Formulaire d'ajout -->
    <form action="{{ route('auth.verifyLogin') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de Passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>


        <button type="submit" class="btn btn-primary">S'authentifier</button>
    </form>



    <div class="text-center mt-4">
        <p>Vous n'avez pas de compte? <a href="{{ route('auth.register') }}" class="text-primary"> Inscrivez-vous
                maintenant</a></p>
    </div>

@endsection
