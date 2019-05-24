@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
    	@if (session('status'))
        <div class="col-sm-12 alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert"></button>
            <i class="fe fe-check mr-2" aria-hidden="true"></i>{{ session('status') }}
        </div>
      @endif
      @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
           <button type="button" class="close" data-dismiss="alert"></button>
         @foreach ($errors->all() as $error)
           <div><i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> {{$error}}</div>
         @endforeach
         </div>
      @endif
      <form action="{{ route('customers.update',$customer->id) }}" method="post" class="card">
      	{{method_field('PATCH')}}
      	@csrf
        <div class="card-header">
          <h3 class="card-title">Edit Customer</h3>
        </div>
        <div class="card-body">
          <div class="row">
           <div class="col-md-12 col-lg-6">
              <div class="form-group">
                <label class="form-label">Name<span class="form-required">*</span></label>
                <input class="form-control" name="customer_name" type="text" value="{{ $customer->customer_name  }}" required="">
              </div>
              <div class="form-group">
                <label class="form-label">Customer ID</label>
                <input class="form-control" name="customer_id" value="{{ $customer->customer_id }}" type="text">
              </div>
              <div class="form-group">
                <label class="form-label">Email<span class="form-required">*</span></label>
                <input class="form-control" name="customer_email" type="email" value="{{ $customer->customer_email }}" required="">
              </div>
              <div class="form-group mb-0">
                <label class="form-label">Phone number</label>
                <input class="form-control" name="customer_phone" type="tel" value="{{ $customer->customer_phone }}"  >
              </div>
          </div> 

          <div class="col-md-12 col-lg-6">
              <div class="form-group">
                <label class="form-label">Location</label>
                <input class="form-control" name="customer_location" value="{{ $customer->customer_location }}" type="text" >
              </div>
              <div class="form-group">
                <label class="form-label">City</label>
                <input class="form-control" name="customer_city" type="text" value="{{ $customer->customer_city }}">
              </div>
              <div class="form-group">
                <label class="form-label">Country</label>
                <input class="form-control" name="customer_country" type="text" value="{{ $customer->customer_country }}">
              </div>
              <div class="form-group mb-0">
                <label class="form-label">Zip</label>
                <input class="form-control" name="customer_zip" value="{{ $customer->customer_zip }}" type="number">
              </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <div class="d-flex">
          <a href="{{ route('customers.index') }}" class="btn btn-link">Cancel</a>
          <button type="submit" class="btn btn-primary ml-auto">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
@stop
