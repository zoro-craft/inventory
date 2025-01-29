@extends('template')
@section('title', 'Ajouter catégorie')

@section('content')
    <!-- Formulaire d'ajout -->
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de la categorie"
                value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description"
                placeholder="Descitption de la categorie" value="{{ old('description') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
    </form>

@endsection
