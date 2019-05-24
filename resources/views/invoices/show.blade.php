@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
       <div class="card-header">
          <h3 class="card-title">Edit Invoice</h3>
        </div>
        <div class="card-body">
          <div class="row">
	          <div class="form-group col-lg-6">
	            <label class="form-label">Customer</label>
	             <div class="form-control-plaintext">{{ $invoice->customer->customer_name }}</div>
	          </div>
	          <div class="form-group col-lg-6">
	            <label class="form-label">Invoice Number</label>
	             <div class="form-control-plaintext">{{ $invoice->number }}</div>
	          </div>
	          <div class="form-group col-lg-6">
	            <label class="form-label">Tax</label>
	             <div class="form-control-plaintext">{{ $invoice->tax }}</div>
	          </div>
	          <div class="form-group col-lg-6">
	            <label class="form-label">Status</label>
	             <div class="form-control-plaintext">{{ ucfirst($invoice->status) }}</div>
	          </div>
	          <div class="form-group col-lg-12">
	            <label class="form-label">Notes</label>
	             <div class="form-control-plaintext">{{ $invoice->notes }}</div>
	          </div>
	     </div>
	     <div class="row">
          <div class="col-md-12 col-lg-12">
              <div class="form-group">
                <label class="form-label">Invoice Items</label> 
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
                      	 @forelse($items as $key => $item)
                               <tr>
		                          <td class="pl-0">
		                             <div class="form-control-plaintext">{{ $item->item_name }}</div>
		                          </td>
		                          <td>
		                          	 <div class="form-control-plaintext">{{ $item->item_id }}</div>
		                          </td>
		                          <td>
		                          	 <div class="form-control-plaintext">{{ $item->item_price }}</div>
		                          </td>
		                          <td class="pr-0">
		                          	 <div class="form-control-plaintext">{{ $item->item_qty }}</div>
		                          </td>
		                          <td class="pr-0">
		                          </td>
	                        </tr>
                        @empty
                            <tr class="text-center"><td colspan="5">No Items Found</td></tr>
                        @endforelse

                        
                    </tbody>
                  </table>
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
