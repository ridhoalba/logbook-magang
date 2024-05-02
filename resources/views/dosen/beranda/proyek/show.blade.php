<!-- resources/views/kegiatan/user.blade.php -->

@extends('dosen.layouts.main')

@section('container')
@if(session('success'))    
    <div class="alert alert-success col-md-5 mt-5 text-center alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>    
@endif

<div class="d-flex col-lg-11 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Proyek Mahasiswa : {{ $user->name }}</h4>
  </div>
  <div class="table-responsive col-lg-11">
    <h4 class="pt-3 mb-4 mt-2">Proyek</h4>
        <table id="proyekShow" class="table table-secondary">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="col">Tanggal Mulai / Selesai</th>
                    <th class="col-2">Nama</th>
                    <th class="col-5">Deskripsi</th>
                    <th class="col">Status</th>
                    <th class="col-2">Dokumentasi</th>
                    <th class="col"><i class="bi bi-gear"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyeks as $proyek)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="col">{{ $proyek->tanggal_mulai }} / {{ $proyek->tanggal_selesai }}</td>
                        <td class="col-2">{{ substr($proyek->nama, 0, 20)  }}</td>
                        <td class="col-5">{!! substr($proyek->deskripsi, 0, 100) !!}</td>
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
                            <a href="/dosen/beranda/proyek/{{ $proyek->id }}/edit" class="badge bg-warning d-inline"><i class="bi bi-pencil-square"></i></a>
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
                    <th class="col-2">Nama</th>
                    <th class="col-4">Deskripsi</th>
                    <th class="col">Bersama</th>
                    <th class="col">Status</th>
                    <th class="col-2">Dokumentasi</th>
                    <th class="col"><i class="bi bi-gear"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyek_bersama as $proyek)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="col">{{ $proyek->tanggal_mulai }} / {{ $proyek->tanggal_selesai }}</td>
                        <td class="col-2">{{ substr($proyek->nama, 0, 20)  }}</td>
                        <td class="col-4">{!! substr($proyek->deskripsi, 0, 100) !!}</td>
                        <td class="col">
                            @foreach ($proyek->mentionsP as $mention)
                                @if ($mention->id !== auth()->user()->id)
                                    {{ $mention->name }} <span class="text-danger border-5" >||</span>
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
                            <a href="/dosen/beranda/proyek/{{ $proyek->id }}/edit" class="badge bg-warning d-inline"><i class="bi bi-pencil-square"></i></a>
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

@endsection
