@extends('dosen.layouts.main')

@section('container')

<div class="mt-3">
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profil</li>
          <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
      </ol>
  </nav>
</div>

@if(session('success')) 
<div class="row justify-content-center">
  <div class="alert alert-success text-center col-md-8 mt-4 alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>    
</div>   
@endif


<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <h4>Reset Password</h4>
        </div>
      </div>
      <div class="card-body">
        <form id="resetPasswordForm" method="POST" action="/dosen/password/reset">
          @csrf
          <div class="form-group row mb-3">
            <div class="col-md-4"><label for="password">Password</label></div>
            <div class="col-md-6"><input type="password" name="password" id="password" class="form-control"></div>
          </div>
          <div class="form-group row mb-3">
            <div class="col-md-4"><label for="confirmPassword">Confirm Password</label></div>
            <div class="col-md-6"><input type="password" name="password_confirmation" id="confirmPassword" class="form-control"></div>
          </div>
          <div class="form-group row mb-3">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">Reset Password</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirmPassword');
    
    function validatePassword() {
      if (passwordField.value !== confirmPasswordField.value) {
        confirmPasswordField.setCustomValidity("Konfirmasi password tidak sesuai.");
      } else {
        confirmPasswordField.setCustomValidity('');
      }
    }
    
    passwordField.addEventListener('change', validatePassword);
    confirmPasswordField.addEventListener('keyup', validatePassword);
  });
</script>

@endsection
