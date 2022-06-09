@extends('layouts.template.app')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/dashboard/index.css') }}">
@endsection
@section('title', 'Loan Calculator Tools')
@section('content')
<div class="tool-container">
  <div class="row">
    <div class="col-md-12">
      <div class="d-grid gap-2 tool loan-calculator-tool-1">
        <a href="loan-ammortization-calculator" class="btn btn-primary btn-block">
          <i class='bx bx-calculator bx-lg'></i>
          <br>
          <p class="h4 button-label mt-3">Loan Ammortization</p>
        </a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="d-grid gap-2 tool loan-calculator-tool-2">
        <button class="btn btn-warning btn-block">
          <i class='bx bx-calculator bx-lg'></i>
          <br>
          <p class="h4 button-label mt-3">Loan Calculator 2</p>
        </button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="d-grid gap-2 tool loan-calculator-tool-3">
        <button class="btn btn-danger btn-block">
          <i class='bx bx-calculator bx-lg'></i>
          <br>
          <p class="h4 button-label mt-3">Loan Calculator 3</p>
        </button>
      </div>
    </div>
  </div>
</div>
@endsection