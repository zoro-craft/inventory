@extends('template')
@section('title', 'Catégories')

@section('content')
    @if (session('success'))
        <div class="alert alert-success rounded-4 border-0 shadow-sm">
            {{ session('success') }}
        </div>
    @endif
    @if (session('success_del'))
        <div class="alert alert-success rounded-4 border-0 shadow-sm">
            {{ session('success_del') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Catégories</h2>
            <p class="text-muted mb-0">Organisez vos produits par catégorie de manière propre et simple.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-primary rounded-pill px-3 py-2">{{ $categories->count() }} éléments</span>
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">
                <i class="fa-solid fa-plus me-1"></i> Créer une catégorie
            </a>
        </div>
    </div>

    <div class="card soft-card overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $cat)
                        <tr>
                            <td>{{ $cat->name }}</td>
                            <td class="text-muted">{{ $cat->description }}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fa-solid fa-pen me-1"></i> Modifier
                                    </a>
                                    <form action="{{ route('categories.destroy', $cat->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                                            <i class="fa-solid fa-trash me-1"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-light border-0 text-center py-4 mb-0">
                                    <i class="fa-solid fa-tags fa-2x text-muted mb-3"></i>
                                    <h5 class="fw-semibold">Aucune catégorie disponible</h5>
                                    <p class="text-muted mb-0">La liste est actuellement vide.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
