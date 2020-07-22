<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marketplace L6</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
<a class="navbar-brand" href="{{ route('home') }}">
    <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    Marketplace L6
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      @auth
    <ul class="navbar-nav mr-auto">
      <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
        <a class="nav-link" href="{{ route('admin.stores.index') }}">Lojas <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item @if(request()->is('admin/products*')) active @endif">
        <a class="nav-link" href="{{ route('admin.products.index') }}">Produtos</a>
      </li>
      <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">Categorias</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <div class="my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <span class="nav-link">{{ auth()->user()->name }}</span>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-dark" href="#" onclick="document.querySelector('form.logout').submit();">Logout</a>
                            
                <form action="{{ route('logout') }}" class="logout" method="POST" style="display:none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    @endauth
  </div>
</nav>
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>
