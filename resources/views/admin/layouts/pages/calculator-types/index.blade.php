@extends('admin.layouts.app')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/dashboard/index.css') }}">
@endsection
@section('title', 'Calculator Types')
@section('content')
<div class="admin-container">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <h3>Configuration</h3>
          <form method="POST" action="/calculator-type/store">
            @csrf
            @include('alerts.session-alerts.index')
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="class-name" class="form-label">Button Class Name</label>
                  <select class="form-select" name="class_name" required>
                    <option selected disabled>Select a Class Name</option>
                    <option value="btn-primary">btn-primary</option>
                    <option value="btn-warning">btn-warning</option>
                    <option value="btn-danger">btn-danger</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="calculator-name" class="form-label">Calculator Name</label>
                  <input type="text" class="form-control" name="description" placeholder="Enter Calulator Name" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="url" class="form-label">Base URL</label>
                  <input type="text" class="form-control" name="base_url" placeholder="Enter desired URL" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control" name="slug" placeholder="Slug goes here" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" name="is_enabled" required>
                    <option selected disabled>Select a Status</option>
                    <option value="enabled">Enabled</option>
                    <option value="disabled">Disabled</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3 d-grid gap-2">
                  <button class="btn btn-primary save" type="submit">Save</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <h3 class="text-center">Preview</h3>
          <div class="preview-wrapper text-center">
            <div class="config-preview">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card mt-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <h3>Calculator Type List</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <thead>
              <th>No</th>
              <th>Calculator Type Name</th>
              <th>URL</th>
              <th>Class Name</th>
              <th>Slug</th>
              <th>Status</th>
            </thead>
            <tbody>
              @foreach ($loan_type_calculators as $ltc)
                <tr>
                  <td>{{ $ltc->id }}</td>
                  <td>{{ $ltc->description }}</td>
                  <td>{{ $ltc->base_url }}</td>
                  <td>{{ $ltc->class_name }}</td>
                  <td>{{ $ltc->slug }}</td>
                  <td>{{ $ltc->is_enabled }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('custom-js')
<script src="{{ asset('js/admin/admin.js') }}"></script>
@endsection