@extends('layouts.app')

@section('content')

<style>
  html, body {
    height: 100%;
    margin: 0;
    overflow: hidden; /* Biar nggak bisa scroll */
  }

  .login-wrapper {
    display: flex;
    height: 100vh;
  }

  .right-side {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .login-box {
    width: 100%;
    max-width: 400px;
    padding: 2rem;
  }

  .form-control {
    border-radius: 30px;
  }

  .btn-primary {
    border-radius: 30px;
  }

  .toggle-password {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
  }
</style>

@if ($errors->any())
  <div class="alert alert-danger text-center">
    <p class="mb-0">Incorrect email or password.</p>
  </div>
@endif

<div class="login-wrapper">
  <!-- Kiri: Gambar -->
  <div class="left-side d-none d-md-block"></div>

  <!-- Kanan: Form -->
  <div class="right-side">
    <div class="login-box card shadow">
      <div class="text-center mb-4">
        <img src="{{ asset('assets/images/logop.png') }}" alt="Logo" style="max-height: 70px;">
        <p class="text-muted mt-2">Selamat datang, silakan login</p>
      </div>

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input 
            type="email" 
            class="form-control" 
            id="email" 
            name="email" 
            placeholder="Masukkan email" 
            required>
        </div>

        <div class="mb-3 position-relative">
          <label for="password" class="form-label">Kata Sandi</label>
          <input 
            type="password" 
            class="form-control" 
            id="password" 
            name="password" 
            placeholder="Masukkan kata sandi" 
            required>
          <button type="button" class="toggle-password" id="togglePassword">
            <i class="fas fa-eye"></i>
          </button>
        </div>

        <div class="d-grid mt-4">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.getElementById("togglePassword").addEventListener("click", function () {
    const passwordInput = document.getElementById("password");
    const icon = this.querySelector("i");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      passwordInput.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  });
</script>

@endsection
