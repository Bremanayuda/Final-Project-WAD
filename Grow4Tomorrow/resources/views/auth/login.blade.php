@extends('auth.auth')

@section('login')
<div class="form-container">
    <h4 class="text-center mb-4">Login</h4>
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
@endsection

@section('register')
<!-- Biarkan kosong -->
@endsection
