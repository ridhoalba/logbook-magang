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
    <h4>Kegiatan Mahasiswa : {{ $user->name }}</h4>
  </div>
  <div class="table-responsive col-lg-11">
    <table id="kegiatan-table" class="table table-secondary">
        <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="col-2">Tanggal</th>
                <th scope="col-7">Kegiatan</th>
                <th scope="col text-center">Status</th>
                <th scope="col-2">Dokumentasi</th>
                <th scope="col"><i class="bi bi-folder-check"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kegiatans as $kegiatan)
            <tr>
                <td scope='row' class="">{{ $loop->iteration }}</td>
                <td class="col-2">{{ $kegiatan->tanggal }}</td>
                <td class="col-7">{!! $kegiatan->kegiatan !!}</td>
                <td class="col text-center">
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
                <td class="col-2">
                    <a href="/dosen/beranda/kegiatan/{{ $kegiatan->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
