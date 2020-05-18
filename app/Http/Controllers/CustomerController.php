<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('home', compact('customers'));
    }

    public function store(Request $request)
    {
        //Validate the requested data
        $data = $request->validate([
            'name'=>'required',
            'last_name'=>'required'
        ],
        [
            'name.required'=>'Please enter your name.',
            'last_name.required'=>'Please enter your last name.'
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->last_name = $request->last_name;
        $customer->save();


        return redirect()->back();
    }




}
