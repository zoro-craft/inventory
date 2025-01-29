@extends('template')
@section('title', 'Page d\'accueil')

@section('content')
    @if (session('logged'))
        <div class="alert alert-success">
            {{ session('logged') }}
        </div>
    @endif

    <div class="container mt-5 p-5 rounded-lg shadow-lg" style="background: linear-gradient(145deg, #f6f9fc, #e1e6f0);">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-4 font-weight-bold text-dark mb-4" style="letter-spacing: 1px;">Bienvenue sur le site de
                    gestion des produits !</h1>
                <p class="lead text-muted mb-5" style="font-size: 1.2rem;">Gérez vos produits facilement et efficacement.</p>
                <a href="{{ route('products.index') }}">
                    <button class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-sm"
                        style="transition: all 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 10px 20px rgba(0, 123, 255, 0.5)';"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                        Explorer maintenant
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
