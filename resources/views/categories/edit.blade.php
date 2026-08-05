@extends('template')
@section('title', 'Modifier catégorie')

@section('content')
    <div class="card soft-card p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Modifier la catégorie</h2>
                <p class="text-muted mb-0">Mettez à jour les détails de cette catégorie.</p>
            </div>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Retour
            </a>
        </div>

        <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" value="{{ $categorie->name }}" class="form-control rounded-3" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control rounded-3" id="description" name="description" rows="3" required>{{ $categorie->description }}</textarea>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Enregistrer
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
