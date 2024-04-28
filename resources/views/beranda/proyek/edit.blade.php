@extends('layouts.main')

@section('container')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Proyek</li>
    </ol>
</nav>

<div class="alert alert-info text-center fs-3 text" role="alert">
  Tambah Proyek
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
          <label for="kelompok" class="form-label">Bersama</label>
          <input type="text" class="form-control @error('kelompok') is-invalid @enderror" id="kelompok" name="kelompok" required value="{{ old('kelompok', $proyek->kelompok) }}">
          @error('kelompok')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="dokumentasi" class="form-label">Dokumentasi</label>
          @if ($proyek->dokumentasi)
                <img src="{{ asset('storage/' . $proyek->dokumentasi) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
              @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
              @endif
                <input class="form-control  @error('dokumentasi') is-invalid @enderror" type="file" id="dokumentasi" name="dokumentasi" onchange="previewImage()">
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
@endsection