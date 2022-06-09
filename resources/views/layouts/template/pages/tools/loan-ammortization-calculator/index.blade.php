@extends('layouts.template.app')
@section('title', 'Loan Ammortization Calculator Form')
@section('content')
<div class="history-container">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="loan-amount" class="form-label">Loan Amount</label>
                <input type="number" class="form-control" name="loan-amount" placeholder="Enter Loan Amount"/> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="loan-amount" class="form-label">Interest Rate</label>
                <input type="number" class="form-control" name="interest-rate" placeholder="Enter Interest Rate"/> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="loan-amount" class="form-label">Ammortization Period <i class="fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Length of time it would take to pay off a mortgage in full."></i></label>
                <input type="number" class="form-control" name="ammortization-period" placeholder="Enter Ammortization Period"/> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3 d-grid gap-2">
                <button class="btn btn-warning">Calculate</button>
              </div>
              <div class="mb-3 d-grid gap-2">
                <button class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <table class="table table-striped">
            <thead>
              <th>Month</th>
              <th>Payment</th>
              <th>Principal</th>
              <th>Interest</th>
              <th>Balance</th> 
            </thead>
            <tbody>
              <tr>
                <td colspan="5" class="text-center">No data available.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection