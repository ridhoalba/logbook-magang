@extends('dosen.layouts.main')

@section('container')
    <div class="d-flex col-lg-6 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
        <h4>Tambah Pengguna Dosen</h4>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="/dosen/beranda/dosen">
                @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label mt-3">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus required value="{{ old('name') }}">
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="nip" class="form-label">Nip</label>
                    <input id="nip" class="form-control @error('nip') is-invalid @enderror" type="text" name="nip" value="{{ old('nip') }}" required>
                    @error('nip')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label ">Email</label>
                    <input class="form-control  @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
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
    </div>
@endsection