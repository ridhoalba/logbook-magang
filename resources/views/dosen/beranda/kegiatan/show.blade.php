@extends('dosen.layouts.main')

@section('container')
@if(session('success'))
    <div class="alert alert-success col-md-5 mt-5 text-center alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="d-flex col-lg-11 justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Kegiatan Mahasiswa : {{ $user->name }}</h4>
</div>
<div class="table-responsive col-lg-11">
    <form id="updateStatusForm" action="{{ route('kegiatan.updateStatus') }}" method="POST">
        @csrf
        <input type="hidden" name="status" id="status-input">
        
        <table id="kegiatan-table" class="table table-secondary">
            <thead>
                <tr>
                    <th scope="row"><input type="checkbox" id="select-all"></th>
                    <th scope="col-2">Tanggal</th>
                    <th scope="col-7">Kegiatan</th>
                    <th scope="col text-center">Status</th>
                    <th scope="col-2">Dokumentasi</th>
                    <th scope="col"><i class="bi bi-folder-check"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatans as $kegiatan)
                <tr>
                    <td scope='row'><input type="checkbox" name="kegiatan_ids[]" value="{{ $kegiatan->id }}"></td>
                    <td class="col-2">{{ $kegiatan->tanggal }}</td>
                    <td class="col-7">{!! $kegiatan->kegiatan !!}</td>
                    <td class="col text-center">
                        @if($kegiatan->accept == 'accepted')
                            <i class="bi bi-check-circle-fill text-success"></i>
                        @elseif($kegiatan->accept == 'rejected')
                            <i class="bi bi-x-circle-fill text-danger"></i>
                        @else
                            <i class="bi bi-clock-history text-warning"></i>
                        @endif
                    </td>
                    <td class="col-2">
                        @if ($kegiatan->dokumentasi)
                            <img src="{{ asset('storage/' . $kegiatan->dokumentasi) }}" alt="" style="max-height: 50px; overflow: hidden;" class="w-50">
                        @else
                            <i class="fas fa-file-image"></i>
                        @endif
                    </td>
                    <td class="col-2">
                        <a href="/dosen/beranda/kegiatan/{{ $kegiatan->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-primary mb-3" onclick="submitForm('accepted')">Terima</button>
        <button type="button" class="btn btn-danger mb-3" onclick="submitForm('rejected')">Tolak</button>
    </form>
</div>

<script>
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.getElementsByName('kegiatan_ids[]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    function submitForm(status) {
        document.getElementById('status-input').value = status;
        document.getElementById('updateStatusForm').submit();
    }
</script>
@endsection
