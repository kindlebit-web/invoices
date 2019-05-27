@extends('layouts.app')
@section('content')
<div class="container">
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
  <div class="row row-cards row-deck">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Invoices</h3>
          <a href="{{ route('invoices.create') }}" class="btn btn-primary ml-auto"><i class="fe fe-file"></i> Add Invoice</a>
        </div>
        <div class="table-responsive">
          <table class="table card-table table-vcenter text-nowrap">
            <thead>
              <tr>
                <th class="w-1">No.</th>
                <th>Customer</th>
                <th>Tax</th>
                <th>Status</th>
                <th colspan="5">Actions</th>                
              </tr>
            </thead>
            <tbody>
               @forelse ($invoices as $invoice)
                  <tr>
                    <td><span class="text-muted">{{ (trim($invoice->number) != '') ? $invoice->number : $invoice->id }}</span></td>
                    <td>{{ $invoice->customer->customer_name }}</td>
                    <td>{{ $invoice->tax }}</td>
                    <td ><span class="status-icon bg-{{ ($invoice->status == \App\Invoice::PENDING) ? 'warning' : ( ($invoice->status == \App\Invoice::PAID) ? 'success' : 'danger') }}"></span>{{ ucfirst($invoice->status) }}</td>
                    <td><a class="icon" href="{{ route('invoices.download', $invoice->id) }}"><i class="fe fe-download"></i></a> </td>
                    <td><a class="icon" href="{{ route('invoices.email', $invoice->id) }}"><i class="fe fe-mail"></i></a> </td>
                    <td><a class="icon" href="{{ route('invoices.show', $invoice->id) }}"><i class="fe fe-eye"></i></a> </td>
                    <td><a class="icon" href="{{ route('invoices.edit', $invoice->id) }}"><i class="fe fe-edit"></i></a></td>
                    <td><a class="icon delete-invoice" id="{{ $invoice->id }}" href="{{ route('invoices.destroy', $invoice->id) }}">
                          <i class="fe fe-trash"></i>
                        </a>
                          <form id="delete-form-{{ $invoice->id }}" action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                        </form>
                      </td>
                  </tr>
              @empty
                  <tr>
                    <td>No invoices found.</td>
                  </tr>
              @endforelse
              
            </tbody>
          </table>
        </div>
      </div>
      {!! $invoices->links() !!}
    </div>
  </div>
</div>
@include('partials/confirmation')
<script type="text/javascript">
    require(['jquery'], function($) {
    $(document).ready(function(){
        $('table').on('click','.delete-invoice',function(e){
                 e.preventDefault();
                 var id = $(this).attr('id');
                 $.confirm({
                  title: 'Confirm!',
                  content: 'Are you to delete this invoice!',
                  buttons: {
                      confirm: function () {
                         $('#delete-form-'+id).submit();
                      },
                      cancel: function () {
                         //close
                      }
                  }
              });                       
        });

    });
  });
</script>
@stop
