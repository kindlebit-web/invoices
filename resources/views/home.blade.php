@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="page-title">Dashboard</h1>
    </div>
    <div class="row row-cards">
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
          <div class="card-body p-3 text-center">
            <div class="h1 m-0">
              {{$totalCustomers}}
            </div>
            <div class="text-muted mb-4">
             Customers
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
          <div class="card-body p-3 text-center">
            <div class="h1 m-0">
              {{$todayCustomers}}
            </div>
            <div class="text-muted mb-4">
              Customers Today
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
          <div class="card-body p-3 text-center">
            <div class="h1 m-0">
              {{$totalInvoices}}
            </div>
            <div class="text-muted mb-4">
              Invoices
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
          <div class="card-body p-3 text-center">
            <div class="h1 m-0">
              {{$todayInvoices}}
            </div>
            <div class="text-muted mb-4">
               Invoices Today
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
          <div class="card-body p-3 text-center">
            <div class="h1 m-0">
              {{$pendingInvoices}}
            </div>
            <div class="text-muted mb-4">
              Pending Invoices
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
          <div class="card-body p-3 text-center">
            <div class="h1 m-0">
              {{$paidInvoices}}
            </div>
            <div class="text-muted mb-4">
              Paid Invoices
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Customers</h3>
          </div>          
          <div class="table-responsive">
            <table class="table card-table table-striped table-vcenter">
              <thead>
                <tr>
                  <th>Customer ID.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @forelse ($customers as $key => $customer)
                  @php if($key > 4) break; @endphp
                  <tr>
                    <td><span class="text-muted">{{ (trim($customer->customer_id) != '') ? $customer->customer_id : $customer->id }}</span></td>
                    <td>{{ $customer->customer_name }}</td>
                    <td>{{ $customer->customer_email }}</td>
                    <td></td>
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
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Invoices</h3>
          </div>          
          <div class="table-responsive">
            <table class="table card-table table-striped table-vcenter">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Customer</th>
                  <th>Subtotal</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              @forelse ($invoices as $key => $invoice)
                @php if($key > 4) break; @endphp
                  <tr>
                    <td><span class="text-muted">{{ (trim($invoice->number) != '') ? $invoice->number : $invoice->id }}</span></td>
                    <td>{{ $invoice->customer->customer_name }}</td>
                    <td>{{ $invoice->tax }}</td>
                     <td ><span class="status-icon bg-{{ ($invoice->status == \App\Invoice::PENDING) ? 'warning' : ( ($invoice->status == \App\Invoice::PAID) ? 'success' : 'danger') }}"></span>{{ ucfirst($invoice->status) }}</td>
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
      </div>
    </div>
  </div>
@endsection
