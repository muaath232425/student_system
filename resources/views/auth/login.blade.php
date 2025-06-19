<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | Admin Panel</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #667eea, #764ba2);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      padding: 30px;
      width: 100%;
      max-width: 400px;
    }

    .glass-card h2 {
      color: #fff;
      font-weight: 600;
      margin-bottom: 30px;
      text-align: center;
    }

    .form-label {
      color: #fff;
    }

    .form-control {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: #fff;
    }

    .form-control::placeholder {
      color: #ddd;
    }

    .form-check-label {
      color: #ddd;
    }

    .btn-login {
      background-color: #ff7e5f;
      border: none;
      width: 100%;
      padding: 10px;
      font-weight: 600;
      color: white;
      transition: 0.3s ease;
    }

    .btn-login:hover {
      background-color: #feb47b;
      color: #000;
    }

    .bottom-link {
      color: #eee;
      font-size: 14px;
      text-align: center;
      margin-top: 15px;
    }

    .bottom-link a {
      color: #ffd;
      text-decoration: underline;
    }

    .invalid-feedback {
      font-size: 13px;
    }
  </style>
</head>
<body>

  <div class="glass-card">
    <h2>🔐 Welcome Back</h2>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" id="email"
               class="form-control @error('email') is-invalid @enderror"
               placeholder="Enter your email"
               value="{{ old('email') }}" required autofocus>
        @error('email')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password"
               class="form-control @error('password') is-invalid @enderror"
               placeholder="********" required>
        @error('password')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>

      <!-- Remember Me -->
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
        <label class="form-check-label" for="remember_me">Remember me</label>
      </div>

      <button type="submit" class="btn btn-login">Login</button>

      <div class="bottom-link mt-3">
        @if (Route::has('password.request'))
          <a href="">Forgot password?</a>
        @endif
      </div>

      <div class="bottom-link">
        Don't have an account? <a href="{{ route('register') }}">Register</a>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
