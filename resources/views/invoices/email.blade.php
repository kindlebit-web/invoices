@component('mail::message')
# Invoice

![Invoice Logo][logo]

[logo]: {{ $invoice->logo }} "Logo"

<b>Date: </b> {{ $invoice->date->formatLocalized('%A %d %B %Y') }}<br />
@if ($invoice->number)
    <b>Invoice #: </b> {{ $invoice->number }}
@endif


<div style="clear:both; position:relative;">
    <div style="position:absolute; left:0pt; width:250pt;">
        <h4>Business Details:</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                {!! $invoice->business_details->count() == 0 ? '<i>No business details</i><br />' : '' !!}
                {{ $invoice->business_details->get('name') }}<br />
                ID: {{ $invoice->business_details->get('id') }}<br />
                {{ $invoice->business_details->get('phone') }}<br />
                {{ $invoice->business_details->get('location') }}<br />
                {{ $invoice->business_details->get('zip') }} {{ $invoice->business_details->get('city') }}
                {{ $invoice->business_details->get('country') }}<br />
            </div>
        </div>
    </div>
    <div style="margin-left: 200pt;top:10px;">
        <h4>Customer Details:</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                {!! $invoice->customer_details->count() == 0 ? '<i>No customer details</i><br />' : '' !!}
                {{ $invoice->customer_details->get('name') }}<br />
                ID: {{ $invoice->customer_details->get('id') }}<br />
                {{ $invoice->customer_details->get('phone') }}<br />
                {{ $invoice->customer_details->get('location') }}<br />
                {{ $invoice->customer_details->get('zip') }} {{ $invoice->customer_details->get('city') }}
                {{ $invoice->customer_details->get('country') }}<br />
            </div>
        </div>
    </div>
</div>
<h4>Items:</h4>

@component('mail::table')
| #   | ID      | Item Name        | Price | Amount | Total |
|---------------|------------------|-------|--------|-------|
@foreach ($invoice->items as $item)
| {{ $loop->iteration }}|{{$item->get('id') }} |{{$item->get('name') }}| {{ $item->get('price') }} {{ $invoice->formatCurrency()->symbol}}|{{$item->get('ammount') }} |{{$item->get('totalPrice') }} {{ $invoice->formatCurrency()->symbol }}|
@endforeach
@endcomponent



 <h4>Total:</h4>
@component('mail::table')
|   |       |  
|---------------|------------------|
| <b>Subtotal</b> | {{ $invoice->subTotalPriceFormatted() }} {{ $invoice->formatCurrency()->symbol }} |
| <b>Taxes {{ $invoice->tax_type == 'percentage' ? '(' . $invoice->tax . '%)' : '' }}</b> | {{ $invoice->taxPriceFormatted() }} {{ $invoice->formatCurrency()->symbol }} |
| <b>TOTAL</b> | {{ $invoice->totalPriceFormatted() }} {{ $invoice->formatCurrency()->symbol }} |


@endcomponent

@component('mail::panel')
@if($invoice->notes)
    {{ $invoice->notes }}
        
@endif

 @if ($invoice->footnote)
    {{ $invoice->footnote }}
@endif
@endcomponent


Thanks,<br>
{{ config('app.name') }}

@endcomponent