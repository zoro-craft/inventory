@extends('template')
@section('title', 'categories')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('success_del'))
        <div class="alert alert-success">
            {{ session('success_del') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->description }}</td>
                    <td>
                        <!-- Formulaire de suppression -->
                        <form action="{{ route('categories.destroy', $cat->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette categorie ?');">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>

                        <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-success">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>



                    </td>
                </tr>
            @empty
                <div class="alert alert-warning">
                    Aucune catégorie disponible pour le moment. <strong>Allez ajouter des catégories!</strong>
                </div>
            @endforelse

        </tbody>

    </table>
@endsection
