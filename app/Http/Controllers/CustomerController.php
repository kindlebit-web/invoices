<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request()->get('s');        
        $customers = auth()->user()->customers()->search($keyword)->latest()->paginate(Customer::PAGE);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $user = $request->user();

        $data = $request->validated();

        $customer = $user->customers()->create($data);

        return redirect(route('customers.index'))->with('status', 'Customer Add Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = auth()->user()->customers()->find($id);
        return ($customer) ? view('customers.show', compact('customer')) : redirect()->back()->withErrors(['Something went wrong!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = auth()->user()->customers()->find($id);
        return ($customer) ? view('customers.edit', compact('customer')) : redirect()->back()->withErrors(['Something went wrong!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $user = $request->user();
        
        $data = $request->validated();

        $customer = $user->customers()->find($id)->update($data);

        return redirect()->back()->with('status', 'Customer Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = auth()->user()->customers()->find($id);
        $customer->delete($id);
        return redirect()->back()->with('status', 'Customer Deleted Successfully!');
    }
}
