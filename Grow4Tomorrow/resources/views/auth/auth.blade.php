<!DOCTYPE html>
<html>
<head>
    <title>Login & Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #004d32;
        }

        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
        }

        .form-container {
            background-color: #ffffff;
            border: 1px solid #004d32;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #004d32;
            border-color: #004d32;
        }

        .btn-primary:hover {
            background-color: #40916c;
            border-color: #40916c;
        }

        .btn-link {
            color: #004d32 !important;
        }

        .btn-link:hover {
            color: #003824 !important;
        }

        .page-title {
            color: #004d32;
            font-weight: bold;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    </head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.jpg') }}" alt="Grow4Tomorrow Logo" style="height: 80px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Education</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Benefits</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Community</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Halaman Auth -->
    <div class="container mt-5">
        <h2 class="text-center page-title">My Account</h2>
        <div class="row">
            <!-- Kolom Login -->
            <div class="col-md-6">
                <div class="form-container">
                    <h4 class="text-center mb-4">Login</h4>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="#" class="btn btn-link">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Kolom Register -->
            <div class="col-md-6">
                <div class="form-container">
                    <h4 class="text-center mb-4">Register</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-email" class="form-label">Email:</label>
                            <input type="email" name="email" id="register-email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-password" class="form-label">Password:</label>
                            <input type="password" name="password" id="register-password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-password-confirmation" class="form-label">Confirm Password:</label>
                            <input type="password" name="password_confirmation" id="register-password-confirmation" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
