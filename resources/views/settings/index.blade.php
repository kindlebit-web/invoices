@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Profile</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label class="form-label">Name</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="10">
            </div>
            <div class="form-group">
              <label class="form-label">Email</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="8">
            </div>
            <div class="form-group">
              <label class="form-label">Old Password</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="19">
            </div>
            <div class="form-group">
              <label class="form-label">New Password</label>
              <input type="text" name="field-name" class="form-control" autocomplete="off" maxlength="9">
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <button type="submit" class="btn btn-primary ml-auto">Save</button>
            </div>
          </div>
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
              <button type="submit" class="btn btn-primary ml-auto">Save</button>
            </div>
          </div>
        </div>
      </div>
      {{-- right form ends --}}
  </div>
</div>
@stop
