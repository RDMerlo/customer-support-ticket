@extends('auth.layout')

@section('content')
    <div class="auth d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="auth__body" style="width: 80%;">
            <div class="auth-title">{{ __('Authorization') }}</div>

            <x-auth-validation-errors :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="{{ __('Password') }}" name="password" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember" checked>
                    <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                </div>
                <div class="auth-submit mt-3">
                    <button type="submit" class="btn btn-success">{{ __('Log in') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
