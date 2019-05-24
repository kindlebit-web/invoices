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
          <h3 class="card-title">Customers</h3>
          <a href="{{ route('customers.create') }}" class="btn btn-primary ml-auto"><i class="fe fe-user"></i> Add Customer</a>
        </div>
        <div class="table-responsive">
          <table class="table card-table table-vcenter text-nowrap">
            <thead>
              <tr>
                <th class="w-1">Customer ID.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th colspan="3">Actions</th>
                
              </tr>
            </thead>
            <tbody>
               @forelse ($customers as $customer)
                  <tr>
                    <td><span class="text-muted">{{ (trim($customer->customer_id) != '') ? $customer->customer_id : $customer->id }}</span></td>
                    <td>{{ $customer->customer_name }}</td>
                    <td>{{ $customer->customer_email }}</td>
                    <td>{{ $customer->customer_phone }}</td>
                    <td><a class="icon" href="{{ route('customers.show',$customer->id) }}"><i class="fe fe-eye"></i></a> </td>
                    <td><a class="icon" href="{{ route('customers.edit',$customer->id) }}"><i class="fe fe-edit"></i></a></td>
                    <td><a class="icon delete-customer" id="{{$customer->id}}" href="{{ route('customers.destroy',$customer->id) }}">
                          <i class="fe fe-trash"></i>
                        </a>
                          <form id="delete-form-{{$customer->id}}" action="{{ route('customers.destroy',$customer->id) }}" method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                        </form>
                      </td>
                  </tr>
              @empty
                  <tr>
                    <td>No Customers found.</td>
                  </tr>
              @endforelse
              
            </tbody>
          </table>
        </div>
      </div>
      {!! $customers->links() !!}
    </div>
  </div>
</div>
@include('partials/confirmation')
<script type="text/javascript">
    require(['jquery'], function($) {
    $(document).ready(function(){
        $('table').on('click','.delete-customer',function(e){
                 e.preventDefault();
                 var id = $(this).attr('id');
                 $.confirm({
                  title: 'Confirm!',
                  content: 'Are you sure ? You want to delete this customer.',
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
