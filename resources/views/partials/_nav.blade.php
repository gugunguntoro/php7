<header>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark z-depth-1" id="stop">
      <a class="brand" href="#"><img src="/images/satu.jpg" width="30" height="30" class="d-inline-block align-top img-perpunjas" alt=""></a>
      <h5 class="perpunjas">perpunjas.org</h5>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
          </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                  <a href="/">Beranda</a>
              </li>
              <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                  <a href="/about">Link</a>
              </li>
              <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                  <a href="/contact">Profile</a>
              </li>
              <li class="nav-item {{ Request::is('photo') ? 'active' : '' }}">
                  <a href="/photo">Photo</a>
              </li>
              <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
                  <a href="/blog">Artikel</a>
              </li>
              <li class="nav-item {{ Request::is('podcasts') ? 'active' : '' }}">
                  <a href="/podcasts">Podcasts</a>
              </li>
              @if(Auth::check())
              <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; padding: 0px;">
          {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('posts.index') }}" style="font-size: 15px; letter-spacing: 5px;">Blog</a>
          <a class="dropdown-item" href="{{ route('albums.index') }}" style="font-size: 15px; letter-spacing: 5px;">Photo</a>
          <a class="dropdown-item" href="{{ route('carousels.index') }}" style="font-size: 15px; letter-spacing: 5px;">Carousel</a>
          <a class="dropdown-item" href="{{ route('categories.index') }}" style="font-size: 15px; letter-spacing: 5px;">Categories</a>
          <a class="dropdown-item" href="{{ route('tags.index') }}" style="font-size: 15px; letter-spacing: 5px;">Tags</a>
          <a class="dropdown-item" href="{{ route('logout') }}" style="font-size: 15px; letter-spacing: 5px;">Logout</a>
        </div>
      </li>
          {{-- @else
            <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
            <a href="{{ route('login') }}">Login</a> --}}
          @endif
          </li>
      </ul>
      <form class="form-inline" method="get" action="{{ url('post') }}">
        <input name="search" class="form-control form-search-tiga" type="search" placeholder="Search" aria-label="Search" style="border-radius: 0px; border: 1px solid #DFDFDF;">
        <button type="submit"  class="form-control-search btn btn-default" aria-label="Left Align" style="background-color: transparent; border-radius: 0px; margin-right: -10px;">
   <i class="fa fa-search" aria-hidden="true"></i>

        </button>
      </form>
      </div>

  </nav>
</header>
<!--Main Navigation-->
