@extends('dosen.layouts.main')

@section('container')
<div class="mt-3">
  <nav aria-label="breadcrumb mt-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Beranda</li>
    </ol>
  </nav>
</div>

  <div class="mt-3">
    <div class="alert alert-info text-center col-md-6 text fs-6 alert-dismissible fade show" role="alert">
      Selamat Bergabung di Logbook Magang Online
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  <div class="d-flex col-lg-6 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Kelompok Bimbingan Magang</h4>
  </div>
  <div class="table-responsive col-lg-6">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tempat Magang</th>
                <th scope="col">Anggota</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelompoks as $kelompok)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kelompok->nama }}</td>
                <td class="ellipsis">
                  <a class="expand-button" onclick="expandColumn(this)"><i class="bi bi-eye-fill"></i></a>
                  <a class="collapse-button" onclick="collapseColumn(this)" style="display: none;"><i class="bi bi-x-circle"></i></a>
                  {{-- <button class="expand-button" onclick="expandColumn(this)">Lihat Semua</button> --}}
                    <span class="member-list">
                        @foreach ($kelompok->users as $user)
                            {{ $user->name }},
                        @endforeach
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
  function expandColumn(button) {
      var td = button.parentNode;
      var memberList = td.querySelector('.member-list');
      td.classList.remove('ellipsis'); // Menghapus gaya elipsis
      button.style.display = 'none'; // Menyembunyikan tombol "Lihat Semua"
      td.querySelector('.collapse-button').style.display = 'inline'; // Menampilkan tombol "Sembunyikan"
      memberList.style.display = 'inline'; // Menampilkan semua anggota
  }

  function collapseColumn(button) {
      var td = button.parentNode;
      var memberList = td.querySelector('.member-list');
      td.classList.add('ellipsis'); // Menambahkan gaya elipsis kembali
      button.style.display = 'none'; // Menyembunyikan tombol "Sembunyikan"
      td.querySelector('.expand-button').style.display = 'inline'; // Menampilkan tombol "Lihat Semua"
      memberList.style.display = 'none'; // Menyembunyikan semua anggota
  }
</script>
@endsection