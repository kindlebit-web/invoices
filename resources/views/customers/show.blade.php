@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
        <div class="card-header">
          <h3 class="card-title">Customer</h3>
        </div>
        <div class="card-body">
          <div class="row">
           <div class="col-md-12 col-lg-6">
              <div class="form-group">
                <label class="form-label">Name<span class="form-required">*</span></label>
                <div class="form-control-plaintext">{{ $customer->customer_name }}</div>
              </div>
              <div class="form-group">
                <label class="form-label">Customer ID</label>
                <div class="form-control-plaintext">{{ $customer->customer_id }}</div>
              </div>
              <div class="form-group">
                <label class="form-label">Email<span class="form-required">*</span></label>
                <div class="form-control-plaintext">{{ $customer->customer_country }}</div>
              </div>
              <div class="form-group mb-0">
                <label class="form-label">Phone number<span class="form-required">*</span></label>
                <div class="form-control-plaintext">{{ $customer->customer_country }}</div>
              </div>
          </div> 

          <div class="col-md-12 col-lg-6">
              <div class="form-group">
                <label class="form-label">Location<span class="form-required">*</span></label>
                <div class="form-control-plaintext">{{ $customer->customer_country }}</div>
              </div>
              <div class="form-group">
                <label class="form-label">City</label>
                <div class="form-control-plaintext">{{ $customer->customer_country }}</div>
              </div>
              <div class="form-group">
                <label class="form-label">Country<span class="form-required">*</span></label>
                <div class="form-control-plaintext">{{ $customer->customer_country }}</div>
              </div>
              <div class="form-group mb-0">
                <label class="form-label">Zip</label>
                <div class="form-control-plaintext">{{ $customer->customer_zip }}</div>
              </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <div class="d-flex">
          <a href="{{ url()->previous()}}" class="btn btn-link">Back</a>
         </div>
      </div>
     
  </div>
</div>
</div>
@stop
