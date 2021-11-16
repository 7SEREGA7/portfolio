<header class="header position-sticky">
  <nav class="navbar navbar-dark">
    <div class="d-flex justify-content-end w-100 d-md-none">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarMenu" aria-controls="navbarMenu"
              aria-expanded="false" aria-label="Toggle navigation">
        <img src="{{ asset('assets/front/img/menu.svg') }}" alt="Menu">
      </button>
    </div>
    <div class="collapse d-md-flex w-100" id="navbarMenu">
      <div class="d-flex justify-content-between align-items-center w-100">
        <a href="{{ route('home') }}" class="logo">
          <img src="{{ asset('assets/front/img/logo.svg') }}" alt="Home">
        </a>
        <ul class="menu">
          <li><a href="/works">Works</a></li>
          <li><a href="/blog">Blog</a></li>
          <li><a href="/contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>