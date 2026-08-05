@extends('template')
@section('title', 'Ajouter produit')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
            <div class="card soft-card p-4 p-lg-5">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Créer un produit</h2>
                        <p class="text-muted mb-0">Ajoutez un nouveau produit à votre catalogue.</p>
                    </div>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left me-1"></i> Retour
                    </a>
                </div>

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control rounded-3" id="name" name="name" placeholder="Nom du produit" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control rounded-3" id="description" name="description" rows="3" placeholder="Description du produit" required></textarea>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="price" class="form-label">Prix (MAD)</label>
                            <input type="number" step="0.01" class="form-control rounded-3" id="price" name="price" placeholder="0.00" required>
                        </div>

                        <div class="col-md-6">
                            <label for="category_id" class="form-label">Catégorie</label>
                            <select class="form-select rounded-3" id="category_id" name="category_id" required>
                                <option value="">Sélectionnez une catégorie</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="image" class="form-label">Photo</label>
                        <input type="file" class="form-control rounded-3" id="image" name="image">
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-plus me-1"></i> Créer le produit
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
