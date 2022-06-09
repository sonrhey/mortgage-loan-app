@extends('layouts.template.app')
@section('title', 'History')
@section('content')
<div class="history-container">
  <div class="loan-calculation-history-table">
    <div class="card">
      <div class="card-body">
        <button class="btn btn-danger">Delete all History</button>
        <div class="mb-4"></div>
        <table class="table table-striped">
          <thead>
            <th>Calculation Id</th>
            <th>Calculator Type</th>
            <th>Title</th>
            <th>Date Added</th>
            <th>Action</th>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Loan Ammortization</td>
              <td>2M Loan Amount</td>
              <td>2022/06/09 09:29PM</td>
              <td>
                <div class="btn-group" role="group" aria-label="controls">
                  <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                  <button class="btn btn-warning"><i class="fa-solid fa-eye"></i></button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection