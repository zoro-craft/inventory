@extends('template')
@section('title', 'Modifier produit')

@section('content')
    <h1>La page de mise à jour</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description"
                value="{{ $product->description }}" required>
        </div>

        <div class="row">
            <!-- Price Input -->
            <div class="form-group col-md-6">
                <label for="price">Prix</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}"
                    required>
            </div>

            <!-- Category Dropdown -->
            <div class="form-group col-md-6">
                <label for="category_id">Catégorie</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Image Upload Section -->
        <div class="row">
            <div class="form-group col-md-6">
                <label for="customFile">Photo</label>
                <input type="file" name="image" class="form-control" id="customFile" />
            </div>

            <!-- Current Image Preview -->
            <div class="col-md-6">
                <label>Current Image</label>
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid img-thumbnail"
                    alt="{{ $product->name }}">
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Annuler</a>
        </div>

    </form>

@endsection
