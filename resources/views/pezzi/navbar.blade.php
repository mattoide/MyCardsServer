<nav class="navbar navbar-expand-lg navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Cards&Offers</a>
 
    <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
                <a class="nav-link" href="/home/all">Tutti i prodotti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/home/my">I miei prodotti</a>
            </li>
            @if( auth()->check() )
            <li class="nav-item">
                <a class="nav-link" href="/addProduct">Aggiungi prodotto</a>
            </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="#">Hi {{ auth()->user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Log Out</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>