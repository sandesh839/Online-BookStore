<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    {{-- <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}"> --}}
      <img src="/assets/images/book-logo.png" alt="logo" />
    </a>
  </div>

  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">

    {{-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button> --}}

    <!-- Search Books -->
    {{-- <ul class="navbar-nav w-100">
      <li class="nav-item w-100">
        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
          <input type="text" class="form-control" placeholder="Search books...">
        </form>
      </li>
    </ul> --}}

    <!-- Right Side -->
    <ul class="navbar-nav navbar-nav-right">

      <!-- Logout -->
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="nav-link btn btn-sm btn-outline-danger" style="border:none;">
            Logout
          </button>
        </form>
      </li>

    </ul>

  </div>
</nav>
