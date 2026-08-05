@extends('template')
@section('title', 'Connexion')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card soft-card p-4 p-lg-5">
                <div class="text-center mb-4">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <h2 class="fw-bold mb-1">Connexion</h2>
                    <p class="text-muted mb-0">Accédez à votre espace de gestion.</p>
                </div>

                @if (session('success'))
                    <div class="alert alert-success rounded-4 border-0 shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('logout_message'))
                    <div class="alert alert-success rounded-4 border-0 shadow-sm">
                        {{ session('logout_message') }}
                    </div>
                @endif
                @if (session('error_login'))
                    <div class="alert alert-danger rounded-4 border-0 shadow-sm">
                        {{ session('error_login') }}
                    </div>
                @endif
                @if (session('access_denied'))
                    <div class="alert alert-danger rounded-4 border-0 shadow-sm">
                        {{ session('access_denied') }}
                    </div>
                @endif

                <form action="{{ route('auth.verifyLogin') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control rounded-3" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control rounded-3" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa-solid fa-right-to-bracket me-2"></i> S'authentifier
                    </button>
                </form>

                <div class="text-center mt-4">
                    <p class="mb-0 text-muted">Vous n'avez pas de compte ? <a href="{{ route('auth.register') }}" class="text-primary fw-semibold">Inscrivez-vous</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
