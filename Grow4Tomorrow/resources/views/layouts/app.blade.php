<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grow4Tomorrow Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .navbar {
            background-color: #004d00;
        }
        .container {
            margin-top: 50px;
        }
        .form-container {
            background-color: #1a1a1a;
            padding: 20px;
            border-radius: 8px;
        }
        .form-container h2 {
            color: #fff;
        }
        .btn-green {
            background-color: #00b33c;
            color: #fff;
        }
        .btn-green:hover {
            background-color: #009933;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">   
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Grow4Tomorrow Logo" style="height: 80px;">
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
    @yield('content')

</body>
</html>
