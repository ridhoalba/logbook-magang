<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Login</title>
  <link rel="shortcut icon" href=" favicon-32x32.png" >
</head>
<body style="background: #08afe6;" class="row align-items-center mx-auto mt-5">

  <div class="row justify-content-center">
    <div class="col-md-3">
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>   
      @endif
      
      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>   
      @endif

      <form class="border p-3 rounded d-grid mx-auto pb-4 bg-dark mt-5" style="width: 315px" action="/login" method="post">
        @csrf
        <img src="https://sim-online.polije.ac.id/assets/img/logo-gabung-putih.png?h=050193e552edd7b265240803b5cf9d30" alt="" class="img-fluid mt-4">
        <div class="mb-3">
          <label for="nim" class="form-label mt-3"></label>
          <input type="text" name="nim" class="form-control @error('nim') is-invalid  @enderror" id="nim" placeholder="Masukkan NIM Anda" autofocus required value="{{ old('nim') }}">
          @error('nim')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label"></label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Login</button>
        <div class="text-center mt-3">
          <a href="/dosen/login" class="btn btn-link text-white">Login sebagai Dosen</a>
        </div>
      </form>
    </div>
  </div>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>