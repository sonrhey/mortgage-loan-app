@extends('layouts.template.app')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/dashboard/index.css') }}">
@endsection
@section('title', 'Loan Calculator Tools')
@section('content')
<div class="tool-container">
  <div class="card">
    <div class="card-body">
      @foreach ($loan_types as $loan_type)
        <div class="row">
          <div class="col-md-12">
            <div class="d-grid gap-2 tool loan-calculator-tool-1">
              <button type="button" onclick="goToPage(`{{ $loan_type->base_url }}/{{ $loan_type->id }}/{{ $loan_type->slug }}`)" class="btn {{ $loan_type->class_name }} btn-block" {{ $loan_type->is_enabled }}>
                <i class='bx bx-calculator bx-lg'></i>
                <br>
                <p class="h4 button-label mt-3">{{ $loan_type->description }}</p>
              </button>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
@section('custom-js')
<script>
function goToPage(url) {
  location.replace(url);
}
</script>
@endsection