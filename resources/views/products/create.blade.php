@extends('template')
@section('title', 'Ajouter produit')

@section('content')
    <!-- Formulaire d'ajout -->
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom du produit" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description"
                placeholder="Description du produit" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="customFile">Photo</label>
            <input type="file" name="image" class="form-control" id="customFile" />
        </div>

        <div class="form-group">
            <label for="price">Prix</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Prix du produit" required>
        </div>

        <div class="form-group">
            <label for="category_id">Categorie</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Sélectionnez une catégorie</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Annuler</a>
    </form>

@endsection
