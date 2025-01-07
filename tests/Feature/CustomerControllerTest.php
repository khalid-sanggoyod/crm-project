<?php

use App\Models\Customer;
use function Pest\Laravel\{post, get, put, delete};

beforeEach(function () {
    // Run before each test
});

test('can create a customer', function () {
    $customerData = Customer::factory()->make()->toArray();

    post(route('customers.create'), $customerData)
        ->assertSuccessful()
        ->assertJsonStructure([
            'status',
            'data' => [
                'id',
                'first_name',
                'last_name',
                'email',
                'contact_number',
                'created_at',
                'updated_at'
            ]
        ]);
});

test('can fetch all customers', function () {
    $customers = Customer::factory(3)->create();

    get(route('customers.index'))
        ->assertSuccessful()
        ->assertJsonStructure([
            'status',
            'data' => [
                '*' => [
                    'id',
                    'first_name',
                    'last_name',
                    'email',
                    'contact_number',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);
});

test('can update a customer', function () {
    $customer = Customer::factory()->create();
    $updateData = Customer::factory()->make()->toArray();

    put(route('customers.update', $customer), $updateData)
        ->assertSuccessful()
        ->assertJsonStructure([
            'status',
            'data' => [
                'id',
                'first_name',
                'last_name',
                'email',
                'contact_number',
                'created_at',
                'updated_at'
            ]
        ]);
});

test('can delete a customer', function () {
    $customer = Customer::factory()->create();

    delete(route('customers.delete', $customer))
        ->assertSuccessful()
        ->assertJsonStructure([
            'status',
            'data' => [
                'message'
            ]
        ]);
}); 