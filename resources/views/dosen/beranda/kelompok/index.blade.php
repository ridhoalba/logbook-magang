<!-- resources/views/kegiatan/user.blade.php -->

@extends('dosen.layouts.main')

@section('container')
@if(session('success'))    
    <div class="alert alert-success col-md-5 mt-5 text-center alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>    
@endif

<div class="mt-3">
    <nav aria-label="breadcrumb mt-3">
      <ol class="breadcrumb">
        <li class="breadcrumb-item " aria-current="page"><a class="text-decoration-none" href="/dosen">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kelompok</li>
      </ol>
    </nav>
  </div>

<div class="d-flex col-lg-11 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Daftar Kelompok Magang</h4>
  </div>
  <div class="table-responsive col-lg-8">
    <table id="proyek-table" class="table table-secondary">
        <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="col-4">Tempat Magang</th>
                <th scope="col-3">Pembimbing</th>
                <th scope="col-5">Anggota</th>
                <th scope="col"><i class="bi bi-folder-check"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelompoks as $kelompok)
            <tr>
                <td scope='row' class="">{{ $loop->iteration }}</td>
                <td class="col-4">{{ $kelompok->nama }}</td>
                <td class="col-3">
                    @if ($kelompok->dosenPembimbing)
                        {{ $kelompok->dosenPembimbing->name }}
                    @else
                        <span class="text-muted">Belum ditetapkan</span>
                    @endif
                </td>
                <td class="col-5">
                    @foreach ($kelompok->users as $user)
                        <div class="col">
                            {{ $user->name }} ({{ $user->nim }})
                        </div>
                    @endforeach
                </td>
                <td class="col-2">
                    <a href="/dosen/beranda/kelompok/{{ $kelompok->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
