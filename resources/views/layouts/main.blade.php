<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logbook Magang Online | Beranda</title>

    <link rel="shortcut icon" href="{{ asset('favicon-32x32.png') }}">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- trix editor text --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    {{-- DataTables --}}
    <link rel="stylesheet" href="/DataTables/datatables.css" />
    
    {{-- font awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        .dropdown-item:hover { /* Ganti dengan warna teks yang Anda inginkan */
            background-color: #555353 !important; /* Ganti dengan warna latar belakang yang Anda inginkan */
        }
    </style>
</head>
<body style="background-color: #b9b9b9">

    {{-- navbar --}}
    @include('partials.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>

    <div id="demo" class="display">
        <table class="display"></table>
    </div>


    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- trix --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    
    {{-- datatables js --}}
    <script src="/DataTables/datatables.js"></script>

    <script>
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        });

        document.addEventListener("trix-before-initialize", function (e) {
            e.preventDefault();
        });

        $(document).ready( function () {
            $('#kegiatan-table').DataTable({
                "scrollY": 200,
                "pageLength": 5
            });
            $('#proyek').DataTable({
                "scrollY": 200,
                "scrollX": true,
                "pageLength": 5
            });
            $('#proyek-bersama').DataTable({
                "scrollY": 200,
                "scrollX": true,
                "pageLength": 5
            });
        } );
    </script>
</body>
</html>