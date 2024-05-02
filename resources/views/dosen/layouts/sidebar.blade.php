<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Logbook Magang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dosen">
            <i class="bi bi-house"></i>
            Beranda
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dosen/beranda/kegiatan">
              <i class="bi bi-activity"></i>
              Kegiatan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dosen/beranda/proyek">
              <i class="bi bi-code"></i>
              Proyek
            </a>
          </li>
          @can('korbid')    
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dosen/beranda/kelompok">
              <i class="bi bi-people"></i>
              Kelompok
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dosen/beranda/users">
              <i class="bi bi-person-add"></i>
              Pengguna
            </a>
          </li>
          @endcan
        </ul>
        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="/dosen/password/reset">
              <i class="bi bi-person-circle"></i> {{ Auth::guard('dosen')->user()->nip }}
            </a>
          </li>
          <li class="nav-item">
            <form action="/dosen/logout" method="post">
            @csrf
              <button type="submit" class="nav-link d-flex align-items-center gap-2 border-0"  style="background-color: transparent;">
                <i class="bi bi-door-closed"></i>
                Logout
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>