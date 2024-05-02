@extends('layouts.main')

@section('container')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar</li>
        </ol>
    </nav>
    
    <div class="alert alert-info text-center fs-3 text" role="alert">
        Daftar Magang
    </div>

    @if(session('success'))    
    <div class="alert alert-success col-md-5 mt-5 text-center alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>    
    @endif
    <div class="col-sm-12 mb-4 mt-2">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Kelompok Magang</h4>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <i class="bi bi-check2-circle"></i><p class="m-0">Sudah daftar</p>
                        </div>
                    </div>
                </div>
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

    @if ($users->isNotEmpty() && $kelompoks->isEmpty())
        <div class="container bg-light rounded-2 pb-2 mb-4">
            <form method="post" action="/beranda/kelompok" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label mt-3">Tempat Magang</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus required value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="selected_users" class="form-label mt-3">Anggota</label>
                    <select multiple class="form-select" id="selected_users" name="selected_users[]">
                      @foreach($users as $user)
                          {{-- Mengecek apakah pengguna memiliki kelompok --}}
                          @unless ($user->kelompok)
                              {{-- Mengecek apakah pengguna adalah pengguna yang sedang login --}}
                              @if ($user->id === auth()->user()->id)
                                  <option value="{{ $user->id }}" selected hidden>{{ $user->name }} ({{ $user->nim }})</option>
                              @else
                                  <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->nim }})</option>
                              @endif
                          @endunless
                      @endforeach
                  </select>
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>
        </div>
    @endif
@endsection
