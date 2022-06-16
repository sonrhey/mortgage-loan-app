@extends('auth.template-auths.layout')
@section('content')
<h4 class="mb-2">Forgot Password? 🔒</h4>
<p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
<form id="formAuthentication" class="mb-3" action="forgot-password" method="POST">
  @csrf
  @if (session('message'))
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> {{ session('message') }}
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
      value="{{ old('email') }}"
      autofocus
    />
  </div>
  <button type="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
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