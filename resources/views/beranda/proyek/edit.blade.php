@extends('layouts.main')

@section('container')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Proyek</li>
    </ol>
</nav>


<div class="alert alert-info text-center fs-3 text" role="alert">
  Ubah Proyek
</div>

<div class="col-lg-6 mb-4">
  <h5>Catatan:</h5>
  @if ($komentarProyek)
      <div class="card mb-3">
          <div class="card-body">
              <p>{{ $komentarProyek->komentar }}</p>
              {{-- <p class="text-muted">Ditambahkan oleh {{ $komentarKegiatan->user->name }} pada {{ $komentarKegiatan->created_at->format('d/m/Y H:i') }}</p> --}}
          </div>
      </div>
  @else
      <div class="card">
        <div class="card-body">
          <p class="text-muted">Tidak ada catatan</p>
        </div>
      </div>
  @endif
</div>

<div class="container bg-light rounded-2 pb-2 mb-4">
    <form method="post" action="/beranda/proyek/{{ $proyek->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="tanggal_mulai" class="form-label mt-3">Tanggal Mulai</label>
          <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" required autofocus value="{{ old('tanggal_mulai', $proyek->tanggal_mulai) }}">
          @error('tanggal_mulai')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
          <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" required value="{{ old('tanggal_selesai', $proyek->tanggal_selesai) }}">
          @error('tanggal_selesai')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama', $proyek->nama) }}">
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <input id="deskripsi" type="hidden" name="deskripsi" required value="{{ old('deskripsi', $proyek->deskripsi) }}">
          <trix-editor input="deskripsi"></trix-editor>
        </div>
        <div class="mb-3">
          <label for="mention" class="form-label">Bersama</label>
          <select multiple class="form-select" name="mention[]">
              @foreach ($mentions as $mention)
                  @php
                      $isSelected = $proyek->mentions->contains($mention->id); // Periksa apakah pengguna disebutkan dalam proyek
                  @endphp
                  <option value="{{ $mention->id }}" {{ $isSelected ? 'selected' : '' }}>{{ $mention->name }}</option>
              @endforeach
          </select>
      </div>      
        <div class="mb-3">
          <label for="dokumentasi" class="form-label">Dokumentasi</label>
          <input type="hidden" name="oldImage" value="{{ $proyek->dokumentasi }}">
          @if ($proyek->dokumentasi)
                <img src="{{ asset('storage/' . $proyek->dokumentasi) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
              @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
              @endif
                <input class="form-control  @error('dokumentasi') is-invalid @enderror" type="file" id="dokumentasi" name="dokumentasi" onchange="previewImage()" value="{{ $proyek->dokumentasi }}">
          @error('dokumentasi')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary d-flex justify-content-end">Ubah</button>
        </div>
    </form>
</div>
<script>
  function previewImage() {
  const image = document.querySelector('#dokumentasi');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const ofReader = new FileReader();
  ofReader.readAsDataURL(dokumentasi.files[0]);

  ofReader.onload = function(oFREvent) {
    imgPreview.src = oFREvent.target.result;
  }
}
</script>
@endsection