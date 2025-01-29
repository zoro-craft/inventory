@extends('template')
@section('title', 'Produits')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            @forelse ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid"
                            alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Prix: </strong> {{ $product->price }} €</p>
                            <p class="card-text">
                                <strong>Catégorie: </strong>{{ $product->category->name ?? 'Aucune catégorie' }}
                            </p>
                            <div class="d-flex justify-content-between">
                                <!-- Edit Button -->
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>

                                <!-- Delete Form -->
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">

                    <div class="alert alert-warning">
                        Aucun produit disponible pour le moment. <strong>Allez ajouter des produits!</strong>
                    </div>

                </div>
            @endforelse
        </div>
    </div>
@endsection
