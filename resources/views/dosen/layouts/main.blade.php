<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logbook Magang Online</title>
    <link rel="shortcut icon" href="https://sim-online.polije.ac.id/assets/favicons/favicon-32x32.png" >
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/DataTables/datatables.css" />
    <style>
      .ellipsis {
          white-space: nowrap; /* Mencegah teks untuk pindah ke baris baru */
          overflow: hidden; /* Menyembunyikan teks yang melebihi batas kotak */
          text-overflow: ellipsis; /* Menambahkan tanda titik-titik untuk menandakan teks yang dipotong */
          max-width: 150px; /* Batasi lebar maksimum untuk mengontrol jumlah karakter yang ditampilkan */
      }

      .expand-button {
        background-color: #007bff;
        color: #fff;
        padding: 1px 1px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    </style>
  </head>
  <body>
    @include('dosen.layouts.header')

    <div class="container-fluid">
      <div class="row">
        @include('dosen.layouts.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          @yield('container')
        </main>
      </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript for this template -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- datatables js --}}
    <script src="/DataTables/datatables.js"></script>
    <script>
    $(document).ready( function () {
      $('#kegiatan-table').DataTable({
        "scrollY": 380,
        "pageLength": 5
      });
      $('#proyek-table').DataTable({
        "scrollY": 380,
        "pageLength": 5,
        "columnDefs": [
            { "width": "20%", "targets": 0 }, // Kolom pertama
            { "width": "30%", "targets": 1 }, // Kolom kedua
            { "width": "50%", "targets": 2 }  // Kolom ketiga
        ]
      });
      $('#proyek-bersama').DataTable({
        "scrollY": 380,
        "pageLength": 5
      });
      $('#user-table').DataTable({
        "scrollY": 250,
        "pageLength": 5
      });
      $('#dosen-table').DataTable({
        "scrollY": 250,
        "pageLength": 5
      });
      $('#proyekShow').DataTable({
        "scrollY": 340,
        "pageLength": 5
      });
    });  
    </script>
  </body>
</html>
