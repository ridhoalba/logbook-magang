<!-- resources/views/kegiatan/user.blade.php -->

@extends('dosen.layouts.main')

@section('container')
@if(session('success'))    
      <div class="alert alert-success text-center" role="alert">
        {{ session('success') }}
      </div>    
@endif

<div class="d-flex col-lg-11 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Kelompok magang : {{ $kelompok->name }} </h4>
</div>
<div class="table-responsive col-lg-11">
  <div class="card">
    <div class="card-header">
      <form method="post" action="/dosen/beranda/kelompok/{{ $kelompok->id }}">
        @method('put')
        @csrf
      <h4 class="card-title">Pembimbing : 
        <select class="form-control col-md-5 mt-3" id="dosen_id" name="dosen_id">
          @foreach($dosens as $dosen)
          <option value="{{ $dosen->id }}" {{ $kelompok->dosenPembimbing ? ($kelompok->dosenPembimbing->id == $dosen->id ? 'selected' : '') : '' }}>{{ $dosen->name }}</option>
          @endforeach
      </select>
      </h4>
      <div class="d-flex justify-content-end" style="gap: 10px;">
          <input type="hidden" name="id" value="{{ $kelompok->id }}">
          <button type="submit" class="btn btn-primary" ><i class="bi bi-check-square"></i></button>
      </form>
      </div>
    </div>
    <div class="card-body">
      <h3 class="row ms-2">Anggota</h3>
            <div class="col-lg-10 mb-4 mt-4">
              <div class="col">
                @foreach ($kelompok->users as $user)
                  <div class="col">
                    {{ $user->name }} ({{ $user->nim }})
                      </div>
                @endforeach
              </div>
            </div>
        </div>
    </div>
</div> 
</div>

@endsection
