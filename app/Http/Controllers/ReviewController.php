<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Models\Review;
use App\Models\Customer;
use App\Models\Room;

class ReviewController extends VoyagerBaseController
{
    public function index(Request $request)
    {
        $reviews = Review::with('customer')->get();
        return view('vendor.voyager.reviews.index', compact('reviews'));
    }

    public function create(Request $request)
    {
        $customers = Customer::all();
        $rooms = Room::all();

        return view('voyager.reviews.create', compact('customers', 'rooms'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'customer_id' => 'required',
            'room_id' => 'required',
            'comment' => 'required',
            'review_date' => 'required|date',
        ]);

        // Create the review
        Review::create($request->all());

        return redirect()->route('voyager.reviews.index')->with('success', 'Review created successfully.');
    }

    public function show(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        return view('vendor.voyager.reviews.show', compact('review'));
    }

    public function edit(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        // echo "<pre>";
        // print_r($review);
        // die;
        $customers = Customer::all();
        $rooms = Room::all();

        return view('vendor.voyager.reviews.edit', compact('review', 'customers', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        // $request->validate([
        //     'customer_id' => 'required',
        //     'room_id' => 'required',
        //     'comment' => 'required',
        //     'review_date' => 'required|date',
        // ]);

        // Update the review
        $review = Review::findOrFail($id);
        $review->update($request->all());

        return redirect()->route('voyager.reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('voyager.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
