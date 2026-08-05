@extends('template')
@section('title', 'Accueil')

@section('content')
    @if (session('logged'))
        <div class="alert alert-success rounded-4 border-0 shadow-sm">
            {{ session('logged') }}
        </div>
    @endif

    <div class="card soft-card p-4 p-lg-5 overflow-hidden">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-3">
                    <i class="fa-solid fa-chart-line me-2"></i> Gestion intelligente
                </span>
                <h1 class="display-5 fw-bold mb-3">Bienvenue dans votre espace de gestion</h1>
                <p class="lead text-muted mb-4">Suivez vos produits, organisez vos catégories et gardez votre catalogue sous contrôle avec une interface claire et professionnelle.</p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-cubes me-2"></i> Voir les produits
                    </a>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-tags me-2"></i> Voir les catégories
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="bg-light rounded-4 p-4 border">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle p-3 me-3">
                            <i class="fa-solid fa-boxes-stacked"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Catalogue centralisé</h5>
                            <p class="text-muted mb-0">Tout est à portée de main.</p>
                        </div>
                    </div>
                    <ul class="list-unstyled mb-0 text-muted">
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Interface moderne</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i> Navigation simple</li>
                        <li><i class="fa-solid fa-circle-check text-success me-2"></i> Gestion rapide des articles</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
