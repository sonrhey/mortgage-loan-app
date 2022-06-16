@extends('auth.template-auths.layout')
@section('content')
<h4 class="mb-2">Reset Password 🔒</h4>
<p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
<form id="formAuthentication" class="mb-3" action="{{ route('password.update') }}" method="POST">
  @csrf
  <input type="hidden" name="token" value="{{ $token }}">
  @if (session('error'))
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    </div>
  @endif
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input
      type="text"
      class="form-control"
      id="email"
      name="email"
      placeholder="Enter your email"
      autofocus
    />
  </div>
  @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  <div class="mb-3 form-password-toggle">
    <label class="form-label" for="password">Password</label>
    <div class="input-group input-group-merge">
      <input
        type="password"
        id="password"
        class="form-control @error('password') is-invalid @enderror"
        name="password"
        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
        aria-describedby="password"
      />
      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
    </div>
  </div>
  @error('password')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  <div class="mb-3 form-password-toggle">
    <label class="form-label" for="password_confirmation">Confirm Password</label>
    <div class="input-group input-group-merge">
      <input
        type="password"
        id="password_confirmation"
        class="form-control"
        name="password_confirmation"
        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
        aria-describedby="password_confirmation"
      />
      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
    </div>
  </div>
  <button type="submit" class="btn btn-primary d-grid w-100">Reset password</button>
</form>
<div class="text-center">
  <a href="login" class="d-flex align-items-center justify-content-center">
    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
    Back to login
  </a>
</div>
@endsection

@section('custom-js')
<script src="{{ asset('js/auth/forgot-password.js') }}"></script>
@endsection