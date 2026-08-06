@extends('template')
@section('title', 'Produits')

@section('content')
    @if (session('success'))
        <div class="alert alert-success rounded-4 border-0 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <h2 class="fw-bold mb-0">Produits</h2>
                <span class="badge bg-primary rounded-pill px-3 py-2">{{ $products->count() }} éléments</span>
            </div>
            <p class="text-muted mb-0">Gérez votre catalogue avec une vue claire et professionnelle.</p>
        </div>
        <div class="d-flex flex-wrap align-items-center gap-2">
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                <i class="fa-solid fa-plus me-1"></i> Créer un produit
            </a>
        </div>
    </div>

    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card soft-card h-100">
                    <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 220px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-semibold mb-0">{{ $product->name }}</h5>
                            <span class="badge bg-light text-dark">{{ $product->category->name ?? 'Sans catégorie' }}</span>
                        </div>
                        <p class="text-muted small flex-grow-1">{{ $product->description }}</p>
                        <div class="fw-bold text-primary mb-3">{{ number_format($product->price, 2, ',', ' ') }} MAD</div>
                        <div class="d-flex flex-column flex-sm-row gap-2 mt-auto">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-primary btn-sm flex-grow-1">
                                <i class="fa-solid fa-pen me-1"></i> Modifier
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                    <i class="fa-solid fa-trash me-1"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-light border rounded-4 shadow-sm text-center py-5">
                    <i class="fa-solid fa-box-open fa-2x text-muted mb-3"></i>
                    <h5 class="fw-semibold">Aucun produit disponible</h5>
                    <p class="text-muted mb-0">Le catalogue est actuellement vide.</p>
                </div>
            </div>
        @endforelse
    </div>
@endsection
