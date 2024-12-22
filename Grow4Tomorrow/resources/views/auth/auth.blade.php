@extends('layout.main')
@section('title', 'My Account')
@section('content')

        <h2 class="text-center page-title">My Account</h2>
        <div class="row">
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
@endsection