<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('img/logo-header-new.png') }}" width="180" height="80" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex ms-auto" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" style="width: 3em;" type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>
      <div class="icon ms-3 mb-2">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-fill fs-3"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fa-solid fa-envelope"></i> <span class="ms-2">Messages</span></a></li>
              <li><a class="dropdown-item d-flex align-items-center" href="#"> <i class="fa-solid fa-bell"></i> <span class="ms-2">Notifications</span></a></li>
              <li><a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> <span class="ms-2">Logout</span></a> </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>