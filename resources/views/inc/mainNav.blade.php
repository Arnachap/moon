<nav class="navbar" id="main-nav">
    <a href="/" class="navbar-brand"></a>

    <ul class="navbar-nav">

        <li class="nav-item nav-dropdown">
            <span class="nav-link dropdown-toggle">Nos Noeuds</span>
            <ul class="dropdown">
                <li class="dropdown-item">
                    <a href="/create" class="nav-link">Crée ton Noeud</a>
                </li>

                <li class="dropdown-item">
                    <a href="/collection" class="nav-link">Notre collection</a>
                </li>
            </ul>
        </li>

        <li class="nav-item nav-dropdown">
            <span class="nav-link dropdown-toggle">Nos accessoires</span>
            <ul class="dropdown">
                <li class="dropdown-item">
                    <a href="/products/t-shirts" class="nav-link">T-shirts</a>
                </li>

                <li class="dropdown-item">
                    <a href="/products/earrings" class="nav-link">Boucles d'oreille</a>
                </li>
                
                <li class="dropdown-item">
                    <a href="/products/caps" class="nav-link">Casquettes</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="/about" class="nav-link">L'entreprise</a>
        </li>
        
        <li class="nav-item">
            <a href="/contact" class="nav-link">Contact</a>
        </li>
    </ul>

    <ul class="navbar-nav right">
        <li class="nav-item">
            @guest
                <a href="{{ route('login') }}" class="nav-link">
                    <i class="fa fa-user"></i>
                </a>
            @else
                <li class="nav-item nav-dropdown">
                    <span class="nav-link dropdown-toggle">
                        <i class="fa fa-user"></i>
                    </span>
                    <ul class="dropdown">
                        <li class="dropdown-item">
                            <a href="/orders" class="nav-link">Mes commandes</a>
                        </li>
        
                        <li class="dropdown-item">
                            
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Se déconnecter
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </li>

        <li class="nav-item">
            <a href="/cart" class="nav-link">
                <i class="fa fa-shopping-cart"></i>
            </a>
        </li>
    </ul>
</nav>