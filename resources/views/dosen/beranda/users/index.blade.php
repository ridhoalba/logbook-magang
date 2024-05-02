<!-- resources/views/kegiatan/user.blade.php -->

@extends('dosen.layouts.main')

@section('container')
<div class="mt-3">
    <nav aria-label="breadcrumb mt-3">
      <ol class="breadcrumb">
        <li class="breadcrumb-item " aria-current="page"><a class="text-decoration-none" href="/dosen">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
      </ol>
    </nav>
  </div>

@if(session('success'))
    <div class="alert alert-success col-md-5 mt-5 text-center alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('error'))    
    <div class="alert alert-danger col-md-5 mt-5 text-center alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="d-flex col-lg-11 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Daftar Pengguna</h4>
</div>

<h5>Mahasiswa</h5>
<div class="table-responsive col-lg-10">
      <div class="col d-flex justify-content-end">
          <a href="/dosen/beranda/users/create" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i></a>
      </div>
    <table id="user-table" class="table table-secondary">
        <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="col-3">Nama</th>
                <th scope="col-2">Nim</th>
                <th scope="col-4">Email</th>
                <th scope="col"><i class="bi bi-folder-check"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td scope='row'>{{ $loop->iteration }}</td>
                <td class="col-3">{{ $user->name }}</td>
                <td class="col-2">{{ $user->nim }}</td>
                <td class="col-4">
                    {{ $user->email }}
                </td>
                <td class="col">
                    <a href="/dosen/beranda/users/{{ $user->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                    <form action="/dosen/beranda/users/{{ $user->id }}" method="post" class="">
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

  <h5 class="mt-4">Dosen</h5>
  <div class="table-responsive mb-4 col-lg-10">
    <div class="col d-flex justify-content-end">
        <a href="/dosen/beranda/dosen/create" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i></a>
    </div>
    <table id="dosen-table" class="table table-secondary">
        <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="col-3">Nama</th>
                <th scope="col-2">Nip</th>
                <th scope="col-4">Email</th>
                <th scope="col"><i class="bi bi-folder-check"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosens as $dosen)
            <tr>
                <td scope='row'>{{ $loop->iteration }}</td>
                <td class="col-3">{{ $dosen->name }}</td>
                <td class="col-2">{{ $dosen->nip }}</td>
                <td class="col-4">
                    {{ $dosen->email }}
                </td>
                <td class="col">
                    <a href="/dosen/beranda/dosen/{{ $dosen->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                    <form action="/dosen/beranda/dosen/{{ $dosen->id }}" method="post" class="">
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
