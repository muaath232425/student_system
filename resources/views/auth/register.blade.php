<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register | Admin Panel</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #667eea, #764ba2);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      padding: 30px;
      max-width: 450px;
      width: 100%;
      color: white;
    }

    .glass-card h2 {
      font-weight: 600;
      text-align: center;
      margin-bottom: 30px;
    }

    label {
      color: #eee;
      font-weight: 600;
    }

    input.form-control {
      background: rgba(255, 255, 255, 0.15);
      border: none;
      color: white;
      padding: 10px 12px;
      border-radius: 8px;
      transition: 0.3s ease;
    }
    input.form-control::placeholder {
      color: #ddd;
    }
    input.form-control:focus {
      background: rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 8px #ffa07a;
      outline: none;
      color: white;
    }

    .btn-register {
      background-color: #ff7e5f;
      border: none;
      width: 100%;
      padding: 12px;
      font-weight: 700;
      font-size: 16px;
      border-radius: 10px;
      transition: background-color 0.3s ease;
    }
    .btn-register:hover {
      background-color: #feb47b;
      color: #000;
    }

    .link-login {
      color: #ddd;
      font-size: 14px;
      display: block;
      text-align: center;
      margin-top: 20px;
    }
    .link-login:hover {
      color: #fff;
      text-decoration: underline;
    }

    .input-error {
      font-size: 13px;
      color: #ff6b6b;
      margin-top: 5px;
    }
  </style>
</head>
<body>

  <div class="glass-card">
    <h2>Create Account</h2>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <div class="mb-3">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your full name" />
        @error('name')
          <div class="input-error">{{ $message }}</div>
        @enderror
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label for="email">Email address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="form-control @error('email') is-invalid @enderror" placeholder="your@example.com" />
        @error('email')
          <div class="input-error">{{ $message }}</div>
        @enderror
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control @error('password') is-invalid @enderror" placeholder="Choose a strong password" />
        @error('password')
          <div class="input-error">{{ $message }}</div>
        @enderror
      </div>

      <!-- Confirm Password -->
      <div class="mb-4">
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Re-enter your password" />
        @error('password_confirmation')
          <div class="input-error">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-register">Register</button>

      <a href="{{ route('login') }}" class="link-login">Already registered? Login here</a>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
