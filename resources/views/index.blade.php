@extends('layouts.main')

@section('container')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Beranda</li>
        </ol>
    </nav>
    <div class="alert alert-info text-center text fs-3" role="alert">
        Selamat Bergabung di Logbook Magang Online
    </div>

    @if(session('success'))    
      <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>    
    @endif

    <div class="col-12 mb-4 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kelompok Magang</h4>
            </div>
            <div class="card-body">
                @foreach ($kelompoks as $kelompok)
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bolder">Tempat Magang</div>
                        <div class="col-md-8">{{ $kelompok->nama }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bolder">Pembimbing</div>
                        <div class="col-md-8">
                            @if ($kelompok->dosenPembimbing)
                                {{ $kelompok->dosenPembimbing->name }}
                            @else
                                <span class="text-muted">Belum ditetapkan</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bolder">Anggota</div>
                        <div class="col-md-8">
                                @foreach ($kelompok->users as $user)
                                    <div class="col">{{ $user->name }} ({{ $user->nim }})</div>
                                @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    

        
    <div class="container bg-light rounded-2 pb-2 mb-4">
        <h4 class="pt-3 mb-4">Kegiatan</h4>
        <table id="kegiatan-table" class="table table-secondary">
            <thead>
                <tr>
                    <th class="col">#</th>
                    <th class="col">Tanggal</th>
                    <th class="col-3">Kegiatan</th>
                    <th class="col-1 text-center">Status</th>
                    <th class="col-2">Dokumentasi</th>
                    <th class="col-1"><i class="bi bi-gear"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatans as $kegiatan)
                    <tr>
                        <td class="col">{{ $loop->iteration }}</td>
                        <td class="col">{{ $kegiatan->tanggal }}</td>
                        <td class="col-3">{!! substr($kegiatan->kegiatan, 0, 50) !!}</td>
                        <td class="col-1">
                            @if($kegiatan->accept == 'accepted')
                                <i class="bi bi-check-circle-fill text-success"></i> <!-- Icon check jika nilai accept diterima -->
                            @elseif($kegiatan->accept == 'rejected')
                                <i class="bi bi-x-circle-fill text-danger"></i> <!-- Icon X jika nilai accept ditolak -->
                            @else
                                <i class="bi bi-clock-history text-warning"></i> <!-- Icon pending jika nilai accept masih pending -->
                            @endif
                        </td>
                        <td class="col-2">
                            @if ($kegiatan->dokumentasi)
                                <img src="{{ asset('storage/' . $kegiatan->dokumentasi) }}" alt="" style="max-height: 50px; overflow: hidden;" class="w-50">
                            @else
                                <i class="fas fa-file-image"></i>
                            @endif
                        </td>
                        <td class="col-1" >
                            <a href="/beranda/kegiatan/{{ $kegiatan->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                            <form action="/beranda/kegiatan/{{ $kegiatan->id }}" method="post" class="">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus data?')">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        
        <h4 class="pt-3 mb-4 mt-5">Proyek</h4>
        <table id="proyek" class="table table-secondary">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="col">Tanggal Mulai / Selesai</th>
                    <th class="col-3">Nama</th>
                    <th class="col-4">Deskripsi</th>
                    <th class="col-1 text-center">Status</th>
                    <th class="col-2">Dokumentasi</th>
                    <th class="col"><i class="bi bi-gear"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyeks as $proyek)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="col">{{ $proyek->tanggal_mulai }} / {{ $proyek->tanggal_selesai }}</td>
                        <td class="col-3">{{ substr($proyek->nama, 0, 20)  }}</td>
                        <td class="col-4">{!! substr($proyek->deskripsi, 0, 100) !!}</td>
                        <td class="col-1 text-center">
                            @if($proyek->accept == 'accepted')
                                <i class="bi bi-check-circle-fill text-success"></i> <!-- Icon check jika nilai accept diterima -->
                            @elseif($proyek->accept == 'rejected')
                                <i class="bi bi-x-circle-fill text-danger"></i> <!-- Icon X jika nilai accept ditolak -->
                            @else
                                <i class="bi bi-clock-history text-warning"></i> <!-- Icon pending jika nilai accept masih pending -->
                            @endif
                        </td>
                        <td class="col-2 text-center">
                            @if ($proyek->dokumentasi)
                                <img src="{{ asset('storage/' . $proyek->dokumentasi) }}" alt="" style="max-height: 50px; overflow: hidden;" class="w-50">
                            @else
                                <i class="fas fa-file-image"></i>
                            @endif
                        </td>
                        
                        <td class="col">
                            <a href="/beranda/proyek/{{ $proyek->id }}/edit" class="badge bg-warning d-inline"><i class="bi bi-pencil-square"></i></a>
                            <form action="/beranda/proyek/{{ $proyek->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus data?')">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h4 class="pt-3 mb-4 mt-5">Proyek Bersama</h4>
        <table id="proyek-bersama" class="table table-secondary">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="col">Tanggal Mulai / Selesai</th>
                    <th class="col-3">Nama</th>
                    <th class="col-3">Deskripsi</th>
                    <th class="col-5">Bersama</th>
                    <th class="col text-center">Status</th>
                    <th class="col-2">Dokumentasi</th>
                    <th class="col"><i class="bi bi-gear"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyek_bersama as $proyek)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="col">{{ $proyek->tanggal_mulai }} / {{ $proyek->tanggal_selesai }}</td>
                        <td class="col-3">{{ substr($proyek->nama, 0, 20)  }}</td>
                        <td class="col-3">{!! substr($proyek->deskripsi, 0, 100) !!}</td>
                        <td class="col-5">
                            @foreach ($proyek->mentions as $mention)
                                @if ($mention->id !== auth()->user()->id)
                                    {{ $mention->name }},
                                @endif
                            @endforeach
                        </td>
                        <td class="col text-center">
                        @if($proyek->accept == 'accepted')
                            <i class="bi bi-check-circle-fill text-success"></i> <!-- Icon check jika nilai accept diterima -->
                        @elseif($proyek->accept == 'rejected')
                            <i class="bi bi-x-circle-fill text-danger"></i> <!-- Icon X jika nilai accept ditolak -->
                        @else
                            <i class="bi bi-clock-history text-warning"></i> <!-- Icon pending jika nilai accept masih pending -->
                        @endif
                        </td>
                        <td class="col-2 text-center">
                            @if ($proyek->dokumentasi)
                                <img src="{{ asset('storage/' . $proyek->dokumentasi) }}" alt="" style="max-height: 50px; overflow: hidden;" class="w-50">
                            @else
                                <i class="fas fa-file-image"></i>
                            @endif
                        </td>
                        <td class="col">
                            <a href="/beranda/proyek/{{ $proyek->id }}/edit" class="badge bg-warning d-inline"><i class="bi bi-pencil-square"></i></a>
                            <form action="/beranda/proyek/{{ $proyek->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus data?')">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
        @endsection