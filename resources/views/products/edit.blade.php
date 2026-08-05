@extends('template')
@section('title', 'Modifier produit')

@section('content')
    <div class="card soft-card p-4 p-lg-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-4">
            <div>
                <h2 class="fw-bold mb-1">Modifier le produit</h2>
                <p class="text-muted mb-0">Mettez à jour les informations du produit ci-dessous.</p>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Retour
            </a>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control rounded-3" id="name" name="name" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control rounded-3" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="price" class="form-label">Prix (MAD)</label>
                    <input type="number" class="form-control rounded-3" id="price" name="price" value="{{ $product->price }}" required>
                </div>

                <div class="col-md-6">
                    <label for="category_id" class="form-label">Catégorie</label>
                    <select class="form-select rounded-3" id="category_id" name="category_id" required>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-3 mt-1">
                <div class="col-md-6">
                    <label for="customFile" class="form-label">Photo</label>
                    <input type="file" name="image" class="form-control rounded-3" id="customFile" />
                </div>

                <div class="col-md-6">
                    <div class="d-flex flex-column">
                        <label class="form-label">Image actuelle</label>
                        <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset('storage/' . $product->image) }}" class="img-fluid rounded-4 border" alt="{{ $product->name }}" style="width: 220px; height: 220px; object-fit: cover;">
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Mettre à jour
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
