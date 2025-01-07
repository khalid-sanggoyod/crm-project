<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    public function create(StoreCustomerRequest $request)
    {
        try {
            $validated = $request->validated();
            $customer = Customer::create($validated);
            
            return response()->json([
                'status' => 'success',
                'data' => $customer
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create customer: ' . $th->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        try {
            $customers = Customer::all();
            return response()->json([
                'status' => 'success',
                'data' => $customers
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch customers: ' . $th->getMessage()
            ], 500);
        }
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        try {
            $validated = $request->validated();
            $customer->update($validated);
            
            return response()->json([
                'status' => 'success',
                'data' => $customer
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update customer: ' . $th->getMessage()
            ], 500);
        }
    }

    public function delete(Customer $customer)
    {
        try {
            $customer->delete();
            
            return response()->json([
                'status' => 'success',
                'message' => 'Customer deleted successfully'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete customer: ' . $th->getMessage()
            ], 500);
        }
    }
}
