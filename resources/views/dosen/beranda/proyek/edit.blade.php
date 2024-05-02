<!-- resources/views/kegiatan/user.blade.php -->

@extends('dosen.layouts.main')

@section('container')
@if(session('success'))    
      <div class="alert alert-success text-center col-lg-11 mt-4" role="alert">
        {{ session('success') }}
      </div>    
@endif

<div class="d-flex col-lg-11 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Tanggal Mulai : {{ $proyek->tanggal_mulai }} / Tanggal Selesai : {{ $proyek->tanggal_selesai }} </h4>
</div>
<div class="table-responsive col-lg-11">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Nama : {{ $proyek->nama }}</h4>
    </div>
    <div class="card-body">
      <h3 class="row ms-2">Deskripsi</h3>
      <div class="d-flex justify-content-end" style="gap: 10px;">
                    @if($proyek->accept == 'accepted')
                        <i class="bi bi-check-circle-fill text-success"></i> <!-- Icon check jika nilai accept diterima -->
                    @elseif($proyek->accept == 'rejected')
                        <i class="bi bi-x-circle-fill text-danger"></i> <!-- Icon X jika nilai accept ditolak -->
                    @else
                        <i class="bi bi-clock-history text-warning"></i> <!-- Icon pending jika nilai accept masih pending -->
                    @endif
        <form method="post" action="/dosen/beranda/proyek/{{ $proyek->id }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          <input type="hidden" name="user_id" value="{{ $proyek->user_id }}">
          <input type="hidden" name="accept" id="" value="accepted" hidden>
          <button type="submit" class="btn btn-primary" ><i class="bi bi-check-square"></i></button>
        </form>
        <form class="" method="post" action="/dosen/beranda/proyek/{{ $proyek->id }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          <input type="hidden" name="user_id" value="{{ $proyek->user_id }}">
          <input type="text" name="accept" id="" value="rejected" hidden>
          <button type="submit" class="btn btn-danger" ><i class="bi bi-x-square"></i></button>
        </form>
      </div>
            <div class="col-lg-6 mb-4 mt-4">
              @if ($proyek->dokumentasi)
                <img src="{{ asset('storage/' . $proyek->dokumentasi) }}" class="img-fluid" style="max-width: 300px" alt="dokumentasi">
              @else
                <img src="" alt="">
              @endif
              <div class="col">
                {!! $proyek->deskripsi !!}
              </div>
            </div>
        </div>
    </div>
</div> 
<div class="container mt-4 mb-4">
  <div class="row">
    <div class="col-lg-6">
      <h5>Catatan:</h5>
      @if ($komentarProyek)
          <div class="card mb-3">
              <div class="card-body">
                  <p>{{ $komentarProyek->komentar }}</p>
                  {{-- <p class="text-muted">Ditambahkan oleh {{ $komentarKegiatan->user->name }} pada {{ $komentarKegiatan->created_at->format('d/m/Y H:i') }}</p> --}}
              </div>
          </div>
      @else
          <p class="text-muted">Tidak ada catatan</p>
      @endif

      <form action="/dosen/beranda/proyek/komentar" method="POST">
        @csrf
        <div class="mb-3">
          <label for="komentar" class="form-label">Catatan</label>
          <textarea class="form-control" id="komentar" name="komentar" rows="3" required></textarea>
        </div>
        <input type="hidden" name="id_proyek" value="{{ $proyek->id }}">
        <button type="submit" class="btn btn-primary">Tambah catatan</button>
      </form>
    </div>
  </div>
</div>
</div>


@endsection
