@extends('layouts.main')

@section('container')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kegiatan</li>
        </ol>
    </nav>
    
    <div class="alert alert-info text-center fs-3 text" role="alert">
      Tambah Kegiatan Harian
    </div>

    <div class="container bg-light rounded-2 pb-2 mb-4">
        <form method="post" action="/beranda/kegiatan" enctype="multipart/form-data">
          @csrf
            <div class="mb-3">
              <label for="tanggal" class="form-label mt-3">Tanggal</label>
              <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" autofocus required value="{{ old('tanggal') }}">
              @error('tanggal')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="kegiatan" class="form-label">Kegiatan</label>
              @error('kegiatan')
                <p class="text-danger" >{{ $message }}</p>
              @enderror
              <input id="kegiatan" type="hidden" name="kegiatan" value="{{ old('kegiatan') }}" required>
              <trix-editor input="kegiatan"></trix-editor>
            </div>
            <div class="mb-3">
              <label for="dokumentasi" class="form-label ">Dokumentasi</label>
              <img src="" class="img-preview img-fluid mb-3 col-sm-3" alt="">
              <input class="form-control  @error('dokumentasi') is-invalid @enderror" type="file" id="dokumentasi" name="dokumentasi" onchange="previewImage()">
              @error('dokumentasi')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3 d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Tambah</button>
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