<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Invoice;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $customers = $user->customers()->get();
        $data['totalCustomers']  = $customers->count();
        $data['todayCustomers'] = $customers->filter(function ($customer) {
            if(!$customer->created_at) return;
            return ($customer->created_at->toDateString() == Carbon::createFromFormat('Y-m-d H:i:s',now())->format('Y-m-d')) ;
        })->count();
        $invoices = $user->invoices()->get();
        $data['totalInvoices'] = $invoices->count();
        $data['todayInvoices'] = $invoices->filter(function ($invoice) {
            if(!$invoice->created_at) return;
            return ($invoice->created_at->toDateString() == Carbon::createFromFormat('Y-m-d H:i:s',now())->format('Y-m-d')) ;
        })->count();
        $data['pendingInvoices'] = $invoices->filter(function ($invoice) {
            return ($invoice->status == Invoice::PENDING) ;
        })->count();
        $data['paidInvoices'] = $invoices->filter(function ($invoice) {
            return ($invoice->status == Invoice::PAID) ;
        })->count();

        $data['customers'] = $customers;
        $data['invoices']  = $invoices;
        return view('home')->with($data);
    }
}
