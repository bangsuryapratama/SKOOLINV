<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  @extends('layouts.app')

@section('content')

@if ($errors->any())
  <div class="alert alert-danger text-center mt-3">
    @foreach ($errors->all() as $error)
      <p class="mb-0">Incorrect email or password.</p>
    @endforeach
  </div>
@endif

<style>
  body {
    background: linear-gradient(100deg, rgba(15, 32, 39, 0.8), rgba(32, 58, 67, 0.8), rgba(44, 83, 100, 0.8)), 
                url('assets/images/pexels-alexander-isreb-880417-1797428.jpg');
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Noto Sans', sans-serif;
  }

  .glass-card {
    background: rgba(233, 233, 233, 0.1);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
    color: white;
  }

  .form-control,
  .form-label {
    color: white !important;
  }

  .form-control::placeholder {
    color: rgba(255, 255, 255, 0.6);
  }

  .btn-custom {
    background-color: #1d3557;
    border: none;
  }

  .btn-custom:hover {
    background-color: #457b9d;
  }

  .toggle-icon-btn {
    background: rgba(255, 255, 255, 0.2);
    border: none;
  }

  .toggle-icon-btn i {
    color: white;
  }
</style>

<div class="container px-3">
  <div class="glass-card p-5 mx-auto" style="max-width: 900px;">
    <div class="row g-4 align-items-center">
      <!-- Form -->
      <div class="col-lg-6">
        <img src="{{ asset('assets/images/logop.png') }}" alt="Logo" class="img-fluid mb-4" style="max-height: 100px;">
        <p class="mb-4 text-white-50">Welcome Admin! Please login to continue.</p>

        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <label for="inputEmailAddress" class="form-label">Email</label>
            <input type="email" class="form-control rounded-pill px-4 bg-transparent border-white" id="inputEmailAddress" name="email" placeholder="Enter Email">
          </div>

          <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control rounded-start-pill px-4 bg-transparent border-white" id="inputPassword" name="password" placeholder="Enter Password">
              <button type="button" class="toggle-icon-btn rounded-end-pill px-3 " id="togglePassword">
                <i class="fas fa-eye" id="toggleIcon"></i>
              </button>
            </div>
          </div>

          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-custom text-white rounded-pill btn-lg w-100">Login</button>
          </div>
        </form>
      </div>

      <!-- Image & Info -->
      <div class="col-lg-6 d-none d-lg-block">
        <div class="text-center">
          <img src="assets/images/pexels-tima-miroshnichenko-6169643.jpg" class="img-fluid rounded-4 shadow" style="max-height: 280px;" alt="Login Image">
          <p class="mt-3 text-white-50">Securely access your dashboard and manage everything with ease.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Show/hide password -->
<script>
  document.getElementById("togglePassword").addEventListener("click", function () {
    const passwordInput = document.getElementById("inputPassword");
    const icon = document.getElementById("toggleIcon");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.classList.remove("fas", "fa-eye");
      icon.classList.add("fas", "fa-eye-slash");
    } else {
      passwordInput.type = "password";
      icon.classList.remove("fas", "fa-eye-slash");
      icon.classList.add("fas", "fa-eye");
    }
  });
</script>

@endsection

</body>
</html>