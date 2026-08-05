@extends('template')
@section('title', 'Ajouter catégorie')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card soft-card p-4 p-lg-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Créer une catégorie</h2>
                        <p class="text-muted mb-0">Ajoutez une nouvelle catégorie à votre catalogue.</p>
                    </div>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left me-1"></i> Retour
                    </a>
                </div>

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control rounded-3" id="name" name="name" placeholder="Nom de la catégorie" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control rounded-3" id="description" name="description" rows="3" placeholder="Description de la catégorie" required></textarea>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-plus me-1"></i> Créer la catégorie
                        </button>
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
