@extends('layouts.template.app')
@section('title', 'Loan Ammortization Calculator Form')
@section('content')
<div class="history-container">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <form id="btn-save">
            <h4>Form</h4>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <input type="text" class="form-control" id="description" placeholder="Enter Loan Description" disabled/> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="description" class="form-label">Currency</label>
                  <select class="form-control" id="currency">
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="loan-amount" class="form-label">Loan Amount</label>
                  <input type="number" class="form-control" id="loan-amount" placeholder="Enter Loan Amount" disabled/> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="loan-amount" class="form-label">Interest Rate (%)</label>
                  <input type="number" class="form-control" id="interest-rate" placeholder="Enter Interest Rate" disabled/> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="loan-amount" class="form-label">Ammortization Period (Months) <i class="fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Length of time it would take to pay off a mortgage in full."></i></label>
                  <input type="number" class="form-control" id="ammortization-period" placeholder="Enter Ammortization Period" disabled/> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3 d-grid gap-2">
                  <button class="btn btn-warning" type="button" id="calculate" disabled>Calculate</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                  <button class="btn btn-primary save" type="submit" disabled>Save</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <h4>Calculation</h4>
          <table class="table table-striped">
            <thead>
              <th>Month</th>
              <th>Payment</th>
              <th>Principal</th>
              <th>Interest</th>
              <th>Balance</th> 
            </thead>
            <tbody id="ammortization-list">
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
@section('custom-js')
<script>
const currencyAPIKey = '{{ env('CURRENCY_API_KEY') }}';
</script>
<script src="{{ asset('js/loan-ammortization-calculator/get-currency.js') }}"></script>
<script src="{{ asset('js/constants/ammortization/index.js') }}"></script>
<script src="{{ asset('js/constants/request-header.js') }}"></script>
<script src="{{ asset('js/loan-ammortization-calculator/api.js') }}"></script>
<script src="{{ asset('js/loan-ammortization-calculator/calculation.js') }}"></script>
<script src="{{ asset('js/loan-ammortization-calculator/index.js') }}"></script>
@endsection