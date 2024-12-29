<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grow4Tomorrow - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        body {
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
        }

        img {
            border: 5px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            background-color: rgba(0, 60, 0, 0.8);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .nav-link {
            color: #e6e6e6;
            font-weight: 500;
            transition: color 0.3s;
        }

        .container {
            margin-top: 50px;
            flex: 1;
        }

        .main-section {
            background-color: #f5f5f5;
            text-align: center;
            padding: 50px 20px;
        }

        .main-section img {
            max-width: 100px;
            margin-bottom: 20px;
        }

        .main-section h5 {
            font-size: 1.2rem;
            color: #666;
        }

        footer {
            background-color: #e6e6e6;
            text-align: center;
            padding: 10px 0;
            color: #666;
            font-size: 0.9rem;
        }

        .scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #00b33c;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            display: none;
        }

        .scroll-to-top:hover {
            background-color: #009933;
        }
    </style>
</head>
<body>

    <div class="wrapper">

        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Grow4Tomorrow Logo" style="height: 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/dashboard">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/education">Education</a></li>
                        <li class="nav-item"><a class="nav-link" href="/benefit">Benefits</a></li>
                        <li class="nav-item"><a class="nav-link" href="/forums">Community</a></li>
                        <li class="nav-item"><a class="nav-link" href="/shop">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
                    </ul>

                    <form method="POST" action="{{ route('logout') }}" style="display: inline; margin-left: auto;">
                        @csrf
                        <button type="submit" class="btn btn-link text-decoration-none" style="color: #e6e6e6; font-size: 0.9rem; padding: 0; border: none; background: none;">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

        <div class="main-section" style="text-align: center; padding: 10px 0; font-size: 14px;">
        <img src="{{ asset('images/logo.jpg') }}" alt="Grow4Tomorrow Logo" style="width: 100px; margin-bottom: 10px;">

        <p style="font-size: 15px; color: #666; margin-top: 5px;">Green Technology for Better Cities</p>
    </div>


    <footer style="font-size: 0.7rem; padding: 5px 0; text-align: center;">
        &copy; 2024 Grow4Tomorrow
    </footer>

    <button class="scroll-to-top" id="scrollToTopBtn">↑</button>

    <script>

        const scrollToTopBtn = document.getElementById('scrollToTopBtn');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                scrollToTopBtn.style.display = 'flex';
            } else {
                scrollToTopBtn.style.display = 'none';
            }
        });

        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7USCnXl1h5ywQfKt5j8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
    </script >

</body>
</html>
