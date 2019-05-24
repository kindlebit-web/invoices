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
      <form action="{{route('invoices.store')}}" method="post" class="card">
      	@csrf
        <div class="card-header">
          <h3 class="card-title">Add Invoice</h3>
        </div>
        <div class="card-body">
          <div class="row">
	          <div class="form-group col-lg-6">
	            <label class="form-label">Customer<span class="form-required">*</span></label>
              <select class="form-control custom-select selectized" name="customer_id" id="selectCus">
                @forelse($customers as $id => $customer)
                  <option value="{{ $id }}">{{ $customer }}</option>
                @empty
                  <option value="">No Customers Found.</option>
                @endforelse
              </select>
	          </div>
	          <div class="form-group col-lg-6">
	            <label class="form-label">Invoice Number<span class="form-required">*</span></label>
	            <input class="form-control" name="number" value="{{ old('number') }}" type="text">
	          </div>
	          <div class="form-group col-lg-6">
	            <label class="form-label">Tax<span class="form-required">*</span></label>
	            <input class="form-control" name="tax" type="text" value="{{ old('tax') }}" required="">
	          </div>
	          <div class="form-group col-lg-6">
	            <label class="form-label">Status<span class="form-required">*</span></label>
              <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="status" value="{{ \App\Invoice::PENDING}}" class="selectgroup-input" checked="">
                    <span class="selectgroup-button"><i class="fe fe-alert-octagon"></i> Pending</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="status" value="{{ \App\Invoice::PAID}}" class="selectgroup-input">
                    <span class="selectgroup-button"><i class="fe fe-check"></i> Paid</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="status" value="{{ \App\Invoice::CANCELLED}}" class="selectgroup-input">   
                    <span class="selectgroup-button"><i class="fe fe-x"></i> Cancelled</span>
                  </label>
                </div>
	          </div>
	          <div class="form-group col-lg-12">
	            <label class="form-label">Notes<span class="form-required">*</span></label>
             <textarea name="notes" class="form-control" id="" cols="30" rows="5" >{{ old('notes') }}</textarea>
	          </div>
	     </div>
	     <div class="row">
          <div class="col-md-12 col-lg-12">
              <div class="form-group">
                <label class="form-label">Invoice Items<span class="form-required">*</span></label> 
              </div>    
              <div class="table-responsive">
                    <table class="table mb-0">
                      <thead>
                        <tr>
                          <th class="pl-0">Item Name</th>
                          <th class="pl-0">ID</th>
                          <th>Price</th>
                          <th>Qty</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="pl-0">
                            <input type="text" value="{{ old('item_name') }}" name="items[0][item_name]" class="form-control" required="true">
                          </td>
                          <td>
                            <input type="text" value="{{ old('item_id') }}" name="items[0][item_id]" class="form-control" required="true">
                          </td>
                          <td>
                            <input type="text" value="{{ old('item_price') }}"  name="items[0][item_price]" class="form-control" required="true">
                          </td>
                          <td class="pr-0">
                            <input type="text" value="{{ old('item_qty') }}" name="items[0][item_qty]" class="form-control" required="true">
                          </td>
                          <td class="pr-0">
                          </td>
                        </tr>
                    </tbody>
                  </table>
                  </div> 
                <button type="button" class="btn btn-outline-primary btn-add"><i class="fe fe-plus mr-2"></i>Add More</button>
              </div>
          </div>
        </div>
      <div class="card-footer text-right">
        <div class="d-flex">
          <a href="{{ url()->previous()}}" class="btn btn-link">Cancel</a>
          <button type="submit" class="btn btn-primary ml-auto">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<script type="text/javascript">
 var invoiceItemIndex = 0; 
 require(['jquery', 'selectize'], function($, selectize) {
    $('#selectCus').selectize({});
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();
        invoiceItemIndex = invoiceItemIndex + 1;
        var invoiceItem = `<tr>
                            <td class="pl-0">
                              <input type="text" name="items[${invoiceItemIndex}][item_name]" class="form-control" required="true">
                            </td>
                            <td>
                              <input type="text" name="items[${invoiceItemIndex}][item_id]" class="form-control" required="true">
                            </td>
                            <td>
                              <input type="text"  name="items[${invoiceItemIndex}][item_price]" class="form-control" required="true">
                            </td>
                            <td class="pr-0">
                              <input type="text" name="items[${invoiceItemIndex}][item_qty]" class="form-control" required="true">
                            </td>
                            <td class="pr-0">
                            <button type="button" class="btn btn-icon btn-primary btn-danger btn-remove"><i class="fe fe-trash"></i></button>
                            </td>
                          </tr>`;
        var invoiceItemsForm = $('.table-responsive tbody'),
            newRow = $(invoiceItem).appendTo(invoiceItemsForm);
            newRow.find('input').val('');
           // invoiceItemsForm.find('tr:not(:last) td:last')
           // .html('<button type="button" class="btn btn-icon btn-primary btn-danger btn-remove"><i class="fe fe-trash"></i></button>');    
    }).on('click', '.btn-remove', function(e) {
      	$(this).parents('tr').remove();
  		  return false;
  	});
});

</script>
@stop
