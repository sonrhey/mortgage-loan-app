@extends('layouts.template.app')
@section('title', $loan_ammortization->title.' Calculation History')
@section('content')
<div class="history-container">
  <div class="loan-calculation-history-table">
    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <div class="mb-3">
              <label>Loan Amount: </label>
              <input type="text" class="form-control" value="{{ $loan_ammortization->currency }} {{ number_format($loan_ammortization->loan_amount, 2, '.', ',') }}" readonly />
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label>Monthly Payment: </label>
              <input type="text" class="form-control" value="{{ $loan_ammortization->currency }} {{ number_format($loan_ammortization_details->first()->payment, 2, '.', ',') }}" readonly />
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label>Interest Rate: </label>
              <input type="text" class="form-control" value="{{ $loan_ammortization->interest_rate * 100 }}%" readonly />
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label>Ammortization Period: </label>
              <input type="text" class="form-control" value="{{ number_format($loan_ammortization->ammortization_period, 0) }} month(s)" readonly />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <th>Month</th>
            <th>Payment</th>
            <th>Principal</th>
            <th>Interest</th>
            <th>Balance</th>
          </thead>
          <tbody>
            @foreach ($loan_ammortization_details as $loan_details)
            <tr>
              <td>{{ $loan_details->month }}</td>
              <td>{{ $loan_ammortization->currency }} {{ number_format($loan_details->payment, 2, '.', ',') }}</td>
              <td>{{ $loan_ammortization->currency }} {{ number_format($loan_details->principal, 2, '.', ',') }}</td>
              <td>{{ $loan_ammortization->currency }} {{ number_format($loan_details->interest, 2, '.', ',') }}</td>
              <td>{{ $loan_ammortization->currency }} {{ number_format($loan_details->balance, 2, '.', ',') }}</td>
            </tr>  
            @endforeach
          </tbody>
        </table>
        <div class="mb-3"></div>
        {!! $loan_ammortization_details->links('pagination::bootstrap-5') !!}
      </div>
    </div>
  </div>
</div>
@endsection