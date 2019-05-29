<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InvoiceRequest;
use ConsoleTVs\Invoices\Classes\Invoice;
use App\Invoice as InvoiceModel;
use Notification;
use App\Notifications\SendInvoice;
use Storage;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request()->get('s');        
        $invoices = auth()->user()->invoices()->search($keyword)->latest()->paginate(InvoiceModel::PAGE);
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $customers = auth()->user()->customers()->latest()->pluck('customer_name', 'id')->all();
         return view('invoices.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        $user = $request->user();
     
        $data = $request->validated();

        $invoice = $user->invoices()->create($data);

        $invoice->items()->createMany($request->items);

        return redirect(route('invoices.index'))->with('status', 'Invoice Add Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $invoice = $user->invoices()->findOrFail($id);
        $items = $invoice->items()->get();
        return ($invoice) ? view('invoices.show', compact('invoice','items')) : redirect()->back()->withErrors(['Something went wrong!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $invoice = $user->invoices()->findOrFail($id);
        $items = $invoice->items()->get();
        $customers = $user->customers()->latest()->pluck('customer_name', 'id')->all();
        return ($invoice) ? view('invoices.edit', compact('invoice','customers','items')) : redirect()->back()->withErrors(['Something went wrong!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvoiceRequest $request, $id)
    {
        $user = $request->user();
     
        $data = $request->validated();

        $invoice = $user->invoices()->find($id);
        $invoice->update($data);
        $invoice->items()->delete();
        $invoice->items()->createMany($request->items);
        return redirect()->back()->with('status', 'Invoice Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = auth()->user()->invoices()->find($id);
        $invoice->delete($id);
        return redirect()->back()->with('status', 'Invoice Deleted Successfully!');
    }

    public function email(Request $request, $id)
    {
      $user = $request->user();
      $invoice = $user->invoices()->findOrFail($id);
      $items = $invoice->items()->get();
      $customer = $invoice->customer;
      $invoiceMaker = Invoice::make();
      foreach ($items as $item) {
        $invoiceMaker->addItem($item->item_name, $item->item_price, $item->item_qty, $item->item_id);
      }
      $invoice = $invoiceMaker->number($invoice->number)
                  ->tax($invoice->tax)
                  ->notes($invoice->notes)
                  ->customer([
                      'name'      => $customer->customer_name,
                      'id'        => (trim($customer->customer_id) != '') ? $customer->customer_id : $customer->id,
                      'phone'     => $customer->customer_phone,
                      'location'  => $customer->customer_location,
                      'zip'       => $customer->customer_zip,
                      'city'      => $customer->customer_city,
                      'country'   => $customer->customer_country,
                  ]);  

       Notification::send($user, new SendInvoice($invoice));

       return redirect()->back()->with('status', 'Invoice Send Successfully!');

    }

    public function download(Request $request, $id)
    {
      $invoice = $request->user()->invoices()->findOrFail($id);
      $items = $invoice->items()->get();
      $customer = $invoice->customer;
      $invoiceMaker = Invoice::make();
      foreach ($items as $item) {
        $invoiceMaker->addItem($item->item_name, $item->item_price, $item->item_qty, $item->item_id);
      }
      return $invoiceMaker->number($invoice->number)
                  ->tax($invoice->tax)
                  ->notes($invoice->notes)
                  ->customer([
                      'name'      => $customer->customer_name,
                      'id'        => (trim($customer->customer_id) != '') ? $customer->customer_id : $customer->id,
                      'phone'     => $customer->customer_phone,
                      'location'  => $customer->customer_location,
                      'zip'       => $customer->customer_zip,
                      'city'      => $customer->customer_city,
                      'country'   => $customer->customer_country,
                  ])->download('invoice-'.$id);
    }
}
