@extends('template')
@section('title','Modifier catégorie')

@section('content')
<!-- Formulaire d'ajout -->
<h2>Update: Category</h2>
<form action="{{route('categories.update', $categorie->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" value="{{$categorie->name}}" class="form-control" id="name" name="name"required>
    </div>

    <div class="form-group">
        <label for="description">Email</label>
        <input type="text" value="{{$categorie->description}}" class="form-control" id="description" name="description"  required>
    </div>

    <button type="submit" class="btn btn-success">Modifier</button>
    <a href="" class="btn btn-secondary">Annuler</a>
</form>

@endsection
