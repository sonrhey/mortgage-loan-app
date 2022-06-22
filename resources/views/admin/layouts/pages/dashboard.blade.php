@extends('admin.layouts.app')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/dashboard/index.css') }}">
@endsection
@section('title', 'Transaction List')
@section('content')
<div class="admin-container">
  <div class="card">
    <div class="card-body text-center">
      <table class="table table-striped">
        <thead>
          <th>No</th>
          <th>Calculator Type</th>
          <th>Loan Description</th>
          <th>Added By</th>
          <th>Date Added</th>
        </thead>
        <tbody>
          @if (!count($transactions))
            <tr>
              <td colspan="5">No data available.</td>
            </tr>
          @endif

          @foreach ($transactions as $transaction )
            <tr>
              <td>{{ $transaction->id }}</td>
              <td>{{ $transaction->loan_type->description }}</td>
              <td>{{ $transaction->loan_ammortization->title }}</td>
              <td>{{ $transaction->user->name }}</td>
              <td>{{ $transaction->created_at }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('custom-js')
@endsection