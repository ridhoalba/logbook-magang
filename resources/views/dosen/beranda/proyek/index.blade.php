@extends('dosen.layouts.main')

@section('container')
<div class="mt-3">
    <nav aria-label="breadcrumb mt-3">
      <ol class="breadcrumb">
        <li class="breadcrumb-item " aria-current="page"><a class="text-decoration-none" href="/dosen">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Proyek</li>
      </ol>
    </nav>
  </div>
  
    <div class="mt-3">
      <div class="alert alert-info text-center col-md-6 text fs-6 alert-dismissible fade show" role="alert">
        Selamat Datang di Logbook Magang Online
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
    @foreach ($kelompoks as $kelompok)
    <div class="d-flex col-lg-6 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      {{-- @dd($kelompok) --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tempat Magang : {{ $kelompok->nama }}</h4>
            </div>
            <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bolder">Anggota</div>
                        <div class="col-md-8">
                                @foreach ($kelompok->users as $user)
                                    <div class="col">
                                      {{ $user->name }} ({{ $user->nim }})
                                      <a href="/dosen/beranda/proyek/{{ $user->id }}"><i class="bi bi-eye-fill"></i></a> 
                                    </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection