<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-4">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4">Create Account</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
