<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Gestion Du Magasin</a>
        <button class="navbar-toggler disabled" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (session('authentication'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Table des produits</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.create') }}">Ajouter un
                            produit</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Table des
                            catégories</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.create') }}">Ajouter une
                            catégorie</a>
                    </li>
                @endif
                @if (!session('authentication'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('auth.login') }}">Se connecter</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('auth.register') }}">S'inscrire</a></li>
                @endif
            </ul>
            @if (session('authentication'))
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                            style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-sign-out"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
