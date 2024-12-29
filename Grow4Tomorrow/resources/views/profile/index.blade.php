@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg" style="width: 100%; max-width: 500px; border-radius: 10px;">
        <div class="card-body">
            <h2 class="text-center mb-4">Profile</h2>

            <!-- Tampilkan pesan sukses -->
            @if(session('success'))
                <div class="alert alert-success fade-out" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-block" style="background-color: #00b33c; border-color: #009933; font-weight: bold;">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Animasi untuk menghilangkan alert */
    .fade-out {
        animation: fadeOut 5s ease-in-out forwards;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        80% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            visibility: hidden;
        }
    }
</style>
@endsection
