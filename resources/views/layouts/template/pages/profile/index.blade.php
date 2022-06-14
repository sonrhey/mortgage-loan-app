@extends('layouts.template.app')
@section('title', 'Profile')
@section('content')
<div class="card mb-4">
  <h5 class="card-header">Profile Details</h5>
  <div class="card-body">
    <div class="d-flex align-items-start align-items-sm-center gap-4">
      <img
        src="{{ asset('template_resources/assets/img/avatars/1.png') }}"
        alt="user-avatar"
        class="d-block rounded"
        height="100"
        width="100"
        id="uploadedAvatar"
      />
      <div class="button-wrapper">
        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
          <span class="d-none d-sm-block">Upload new photo</span>
          <i class="bx bx-upload d-block d-sm-none"></i>
          <input
            type="file"
            id="upload"
            class="account-file-input"
            hidden
            accept="image/png, image/jpeg"
          />
        </label>
        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" id="reset-image">
          <i class="bx bx-reset d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Reset</span>
        </button>
      </div>
    </div>
  </div>
  <hr class="my-0" />
  <div class="card-body">
    <form method="POST" action="/profile/{{ $user->id }}">
      @method('PUT')
      @csrf
      @if (session('success'))
        <div class="row">
          <div class="col-md-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        </div>
      @endif
      @if (session('error'))
        <div class="row">
          <div class="col-md-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        </div>
      @endif
      <div class="row">
        <div class="mb-3 col-md-4">
          <label for="firstName" class="form-label">First Name</label>
          <input
            class="form-control"
            type="text"
            name="name"
            value="{{ $user->name }}"
            autofocus
            disabled
          />
        </div>
        <div class="mb-3 col-md-4">
          <label for="email" class="form-label">E-mail</label>
          <input
            class="form-control"
            type="text"
            id="email"
            name="email"
            value="{{ $user->email }}"
            placeholder="john.doe@example.com"
            disabled
          />
        </div>
        <div class="mb-3 col-md-4">
          <label for="lastName" class="form-label">Created At</label>
          <input class="form-control" type="text" name="created_at" value="<?php 
            $date = strtotime($user->created_at);
            echo date("j F Y", $date);
          ?>" disabled />
        </div>
      </div>
      <div class="mt-2">
        <button type="button" class="btn btn-danger me-2 btn-edit">Edit Info</button>
        <button type="submit" class="btn btn-primary me-2 btn-save d-none">Save Changes</button>
        <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#change-password">Change Password</button>
        <button type="reset" class="btn btn-outline-secondary btn-cancel">Cancel</button>
      </div>
    </form>
  </div>
</div>
@include('layouts.template.modals.profile.change-password')
@endsection
@section('custom-js')
<script src="{{ asset('js/constants/request-header.js') }}"></script>
<script src="{{ asset('js/profile/invalid-indicator.js') }}"></script>
<script src="{{ asset('js/profile/toggle-edit.js') }}"></script>
<script src="{{ asset('js/profile/toggle-fields.js') }}"></script>
<script src="{{ asset('js/profile/api.js') }}"></script>
<script src="{{ asset('js/profile/index.js') }}"></script>
@endsection