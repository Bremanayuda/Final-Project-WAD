@extends('auth.auth')

@section('register')
<div class="form-container">
    <h4 class="text-center mb-4">Register</h4>
    <form method="POST" action="{{ route('register') }}">
        @csrf
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
@endsection

@section('login')
@endsection
