<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            color: #333;
        }

        img {
            border: 5px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .container {
            margin-top: 50px;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h4 {
            font-weight: 600;
            color: #333;
        }

        .alert {
            font-weight: bold;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #00b33c;
            box-shadow: 0 0 10px rgba(0, 179, 60, 0.3);
        }

        .btn {
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #00b33c;
            border: none;
        }

        .btn-primary:hover {
            background-color: #009933;
        }

        .btn-link {
            color: #00b33c;
            font-size: 14px;
        }

        .btn-link:hover {
            color: #009933;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col-md-6 {
            max-width: 500px;
        }

        .d-flex {
            margin-top: 10px;
        }

        .d-flex .btn {
            width: 100%;
        }

        .page-title {
            font-size: 3rem;
            font-weight: bold;
            color: #fff;
            text-align: center;
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 2px;
            background-image: linear-gradient(to right, #00b33c, #009933); 
            -webkit-background-clip: text;
            background-clip: text;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3); 
        }

        /* Footer */
        footer {
            background-color: #e6e6e6;
            padding: 5px 0;  
            color: #666;
            font-size: 0.7rem;  
            text-align: center;
        }

        footer img {
            max-width: 40px;  
            margin-bottom: 5px;
        }

        footer p {
            margin-top: 5px;
        }

        .alert {
            animation: fadeOut 3s forwards;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                visibility: hidden;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div id="logoutAlert" class="alert alert-success text-center" style="margin: 20px auto;">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="page-title">My Account</h2>

        <div class="row">
            <div class="col-md-6 py-3">
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
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-6 py-3">
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

    <footer>
        <p>&copy; 2024 Grow4Tomorrow</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
