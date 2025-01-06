<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    public function create(StoreCustomerRequest $request)
    {
        $validated = $request->validated();
        
        $customer = Customer::create($validated);
        
        return response()->json([
            'status' => 'success',
            'data' => $customer
        ], 201);
    }

    public function get(Customer $customer)
    {
        $customer = Customer::all();
        return response()->json([
            'status' => 'success',
            'data' => $customer
        ], 200);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    public function delete(Customer $customer)
    {
        //
    }
}
