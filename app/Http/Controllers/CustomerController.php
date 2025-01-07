<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Traits\ApiResponse;

class CustomerController extends Controller
{
    use ApiResponse;

    public function create(StoreCustomerRequest $request)
    {
        return $this->executeAction(
            fn() => Customer::create($request->validated()),
            'Failed to create customer'
        );
    }

    public function index()
    {
        return $this->executeAction(
            fn() => Customer::all(),
            'Failed to fetch customers'
        );
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        return $this->executeAction(
            function() use ($request, $customer) {
                $customer->update($request->validated());
                return $customer;
            },
            'Failed to update customer'
        );
    }

    public function delete(Customer $customer)
    {
        return $this->executeAction(
            function() use ($customer) {
                $customer->delete();
                return ['message' => 'Customer deleted successfully'];
            },
            'Failed to delete customer'
        );
    }
}
