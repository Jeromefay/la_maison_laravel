
<h1 class="bg-dark text-white">
    Boutique
    <small class="text-white">La maison</small>
</h1>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
    @if(Auth::check())
    
      <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">Retour à l'accueil<span class="sr-only">(current)</span></a>
      </li>
      
        @else
        <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">ACCUEIL<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('solde')}}">SOLDES
        </a>
      </li>
      @endif
      </li>
      
      @if(Route::is('products.*') == false)
      @foreach($categories as $id => $title)
      <li class="nav-item">
        <a class="nav-link" href="{{url('category', $id)}}">{{strtoupper($title)}}</a>
      </li>
      @endforeach
      @endif

      
    </ul>
    
    @if(Auth::check())
      <span class="navbar-text">
        <a class="text-muted" href="{{route('products.create')}}">Ajouter un produit</a>
     
     
        <a class="text-muted" href="{{route('products.index')}}">DASHBOARD</a>
      
      
        <a class="text-muted" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        LOGOUT
        </a>
      
      <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
      @else
      <a class="text-muted" href="{{route('login')}}">LOGIN</a>
      @endif
    </span>
  </div>
</nav>