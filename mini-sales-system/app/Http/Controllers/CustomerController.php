<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    //

    public function fromcustomer()
    {

        return view('order.createCustomer');
    }

    public function insertcustomer(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'phone_number' => 'required|numeric|min:11',
            'address' => 'required',
            'user_id' => 'required|numeric'

        ]);

        $customers = new Customer();
        $customers->name = $request->name;
        $customers->phone_number = $request->phone_number;
        $customers->address = $request->address;
        $customers->user_id = $request->user_id;
        $customers->save();
        return redirect()->route('order');

    }

}
