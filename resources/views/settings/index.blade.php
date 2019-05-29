@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
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
        <div class="card">
          <form method="POST" action="{{ route('profile.update')}}" class="card">
            @csrf
          <div class="card-header">
            <h3 class="card-title">Profile</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
            </div>
            <div class="form-group">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
            </div>
            <div class="form-group">
              <label class="form-label">Old Password</label>
              <input type="password" name="password" class="form-control" name="password" autocomplete="off">
            </div>
            <div class="form-group">
              <label class="form-label">New Password</label>
              <input id="password-confirm" type="password" class="form-control" name="new_password" >
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <button type="submit" class="btn btn-primary ml-auto">Save</button>
            </div>
          </div>
        </form>
        </div>
      </div>

      {{-- right form starts --}}
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Business & Invoice Settings</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label class="form-label">Business Name</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="10">
            </div>
            <div class="form-group">
              <label class="form-label">Business ID</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="10">
            </div>
            <div class="form-group">
              <label class="form-label">Phone</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="10">
            </div>
            <div class="form-group">
              <label class="form-label">Location</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="10">
            </div>
            <div class="form-group">
              <label class="form-label">Zip</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="10">
            </div>
            <div class="form-group">
              <label class="form-label">City</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="10">
            </div>
            <div class="form-group">
              <label class="form-label">Country</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="10">
            </div>
            <div class="form-group">
              <label class="form-label">Decimal Precision</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="10">
            </div>
            <div class="form-group">
              <label class="form-label">Tax Type</label>
              <div class="selectgroup w-100">
                <label class="selectgroup-item">
                  <input type="radio" name="tax_type" value="" class="selectgroup-input" checked="">
                  <span class="selectgroup-button"><i class="fe fe-percent"></i> Percentage</span>
                </label>
                <label class="selectgroup-item">
                  <input type="radio" name="tax_type" value="" class="selectgroup-input">
                  <span class="selectgroup-button"><i class="fe fe-thumbs-up"></i> Fixed</span>
                </label>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Tax Percentage or Fixed amount</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="19">
            </div>
            <div class="form-group">
              <label class="form-label">Logo Link</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="19">
            </div>
            <div class="form-group">
              <label class="form-label">Currency</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="9">
            </div>
            <div class="form-group">
              <label class="form-label">Foot note</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="9">
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <button type="submithg" class="btn btn-primary ml-auto">Save</button>
            </div>
          </div>
        </div>
      </div>
      {{-- right form ends --}}
  </div>
</div>
@stop
