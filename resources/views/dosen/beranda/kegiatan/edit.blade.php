<!-- resources/views/kegiatan/user.blade.php -->

@extends('dosen.layouts.main')

@section('container')
@if(session('success'))    
      <div class="alert alert-success text-center col-lg-11 mt-4" role="alert">
        {{ session('success') }}
      </div>    
@endif

<div class="d-flex col-lg-11 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Tanggal Kegiatan {{ $kegiatan->tanggal }} </h4>
</div>
<div class="table-responsive col-lg-11">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Kegiatan :</h4>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-end" style="gap: 10px;">
                   @if($kegiatan->accept == 'accepted')
                        <i class="bi bi-check-circle-fill text-success"></i> <!-- Icon check jika nilai accept diterima -->
                    @elseif($kegiatan->accept == 'rejected')
                        <i class="bi bi-x-circle-fill text-danger"></i> <!-- Icon X jika nilai accept ditolak -->
                    @else
                        <i class="bi bi-clock-history text-warning"></i> <!-- Icon pending jika nilai accept masih pending -->
                    @endif
        <form method="post" action="/dosen/beranda/kegiatan/{{ $kegiatan->id }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          <input type="hidden" name="user_id" value="{{ $kegiatan->user_id }}">
          <input type="hidden" name="accept" id="" value="accepted" hidden>
          <button type="submit" class="btn btn-primary" ><i class="bi bi-check-square"></i></button>
        </form>
        <form class="" method="post" action="/dosen/beranda/kegiatan/{{ $kegiatan->id }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          <input type="hidden" name="user_id" value="{{ $kegiatan->user_id }}">
          <input type="text" name="accept" id="" value="rejected" hidden>
          <button type="submit" class="btn btn-danger" ><i class="bi bi-x-square"></i></button>
        </form>
      </div>
            <div class="col-lg-10 mb-4 mt-4">
              @if ($kegiatan->dokumentasi)
                <img src="{{ asset('storage/' . $kegiatan->dokumentasi) }}" style="max-width: 300px" class="img-fluid" alt="dokumentasi">
              @else
                <img src="" alt="">
              @endif
              <div class="col mt-4">
                {!! $kegiatan->kegiatan !!}
              </div>
            </div>
        </div>
    </div>
</div> 
<div class="container mt-4 mb-4">
  <div class="row">
    <div class="col-lg-6">
      <h5>Catatan:</h5>
      @if ($komentarKegiatan)
          <div class="card mb-3">
              <div class="card-body">
                  <p>{{ $komentarKegiatan->komentar }}</p>
                  {{-- <p class="text-muted">Ditambahkan oleh {{ $komentarKegiatan->user->name }} pada {{ $komentarKegiatan->created_at->format('d/m/Y H:i') }}</p> --}}
              </div>
          </div>
      @else
          <p class="text-muted">Tidak ada catatan</p>
      @endif

      <form action="/dosen/beranda/kegiatan/komentar" method="POST">
        @csrf
        <div class="mb-3">
          <label for="komentar" class="form-label">Komentar</label>
          <textarea class="form-control" id="komentar" name="komentar" rows="3" required></textarea>
        </div>
        <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">
        <button type="submit" class="btn btn-primary">Kirim Komentar</button>
      </form>
    </div>
  </div>
</div>
</div>


@endsection
