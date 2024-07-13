<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('vendor.voyager.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('vendor.voyager.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:10',
        ]);

        Customer::create($request->all());

        return redirect()->route('voyager.customers.index')->with('success', 'Customer created successfully.');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('vendor.voyager.customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('vendor.voyager.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:10',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return redirect()->route('voyager.customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        if ($customer->bookings()->count() > 0) {
            return redirect()->back()->with([
                'message' => 'Cannot delete customer with associated bookings.',
                'alert-type' => 'error',
            ]);
        }

        $customer->delete();

        return redirect()->route('voyager.customers.index')->with([
            'message' => 'Customer deleted successfully.',
            'alert-type' => 'success',
        ]);
    }
}
