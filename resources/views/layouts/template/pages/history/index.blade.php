@extends('layouts.template.app')
@section('title', 'History')
@section('content')
<div class="history-container">
  <div class="loan-calculation-history-table">
    <div class="card">
      <div class="card-body">
        <button class="btn btn-danger" id="delete-all" disabled>Delete all History</button>
        <div class="mb-4"></div>
        <table class="table table-striped" id="history-list">
          <thead>
            <th>Calculation Id</th>
            <th>Calculator Type</th>
            <th>Title</th>
            <th>Loan Amount</th>
            <th>Interest Rate</th>
            <th>Ammortization Period </th>
            <th>Date Added</th>
            <th>Action</th>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@include('layouts.template.modals.history.delete-prompt')
@endsection
@section('custom-js')
<script src="{{ asset('js/constants/request-header.js') }}"></script>
<script src="{{ asset('js/constants/ammortization/index.js') }}"></script>
<script src="{{ asset('js/history/api.js') }}"></script>
<script src="{{ asset('js/history/index.js') }}"></script>
@endsection