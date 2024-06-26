<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Logbook MO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'beranda') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'kegiatan') ? 'active' : '' }}" href="/beranda/kegiatan">Kegiatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'proyek') ? 'active' : '' }}" href="/beranda/proyek">Proyek</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'daftar') ? 'active' : '' }}" href="/beranda/kelompok">Daftar</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"></i> {{ auth()->user()->nim }}
            </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
              <li>
                <a href="/password/reset" class="dropdown-item text-light" ><i class="bi bi-lock"></i> Ubah Password</a>
              </li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item text-light" ><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($active === 'login') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
          @endauth
          
        </ul>
      </div>
    </div>
  </nav>