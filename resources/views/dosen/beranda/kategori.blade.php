@extends('dosen.layouts.main')

@section('container')
<div class="mt-3">
    <nav aria-label="breadcrumb mt-3">
      <ol class="breadcrumb">
        <li class="breadcrumb-item " aria-current="page"><a class="text-decoration-none" href="/dosen">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
      </ol>
    </nav>
  </div>

  <ul>
    <li><a href="/dosen/beranda/kategori/kegiatan" class="text-decoration-none">Kegiatan</a></li>
    <li><a href="/dosen/beranda/kategori/proyek" class="text-decoration-none">Proyek</a></li>
  </ul>
@endsection