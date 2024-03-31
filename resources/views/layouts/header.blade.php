<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('user.index') }}">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('product.index') }}">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('inventory.index') }}">Inventory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sale.index') }}">Sales</a>
          </li>
        </ul>
        <ul class="me-5">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name ?? 'User' }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
              <li>
                    <form action="{{ route('logout') }}" class="dropdown-item" method="POST">
                    @csrf
                        <button type="submit" class="btn btn-sm btn-white bold">Logout</button>
                    </form>
                </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
