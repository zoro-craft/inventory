<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="{{ route('home') }}">
            <i class="fa-solid fa-boxes-stacked me-2 text-primary"></i> Gestion du magasin
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                @if (session('authentication'))
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('products.index') }}">
                            <i class="fa-solid fa-cubes me-1"></i> Produits
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('categories.index') }}">
                            <i class="fa-solid fa-tags me-1"></i> Catégories
                        </a>
                    </li>
                @endif
                @if (!session('authentication'))
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('auth.login') }}">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('auth.register') }}">S'inscrire</a>
                    </li>
                @endif
            </ul>
        </div>

        @if (session('authentication'))
            <div class="d-flex align-items-center ms-3">
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="fa-solid fa-right-from-bracket me-1"></i>
                        <span class="d-none d-sm-inline">Déconnexion</span>
                    </button>
                </form>
            </div>
        @endif
    </div>
</nav>
