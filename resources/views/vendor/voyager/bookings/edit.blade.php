@extends('voyager::master')

@section('page_title', __('voyager.generic.edit').' Booking')

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <form action="{{ route('voyager.bookings.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="customer_id">Customer</label>
                            <input type="text" class="form-control" name="customer_id" id="check_in_date" value="{{ $booking->customer->first_name." ".$booking->customer->last_name}}" readonly>
                            {{-- <select class="form-control" name="customer_id" id="customer_id" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ $booking->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                        <div class="form-group">
                            <label for="room_id">Room</label>
                            <select class="form-control" name="room_id" id="room_id" required>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}" {{ $booking->room_id == $room->id ? 'selected' : '' }}>{{ $room->room_number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="check_in_date">Check-in Date</label>
                            <input type="date" class="form-control" name="check_in_date" id="check_in_date" value="{{ \Carbon\Carbon::parse($booking->check_in_date)->format('Y-m-d') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="check_out_date">Check-out Date</label>
                            <input type="date" class="form-control" name="check_out_date" id="check_out_date" value="{{ \Carbon\Carbon::parse($booking->check_out_date)->format('Y-m-d') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="number" class="form-control" name="total_amount" id="total_amount" value="{{ $booking->total_amount }}" required>
                        </div>
                        <div class="form-group">
                            <label for="booking_date">Booking Date</label>
                            <input type="date" class="form-control" name="booking_date" id="booking_date" value="{{ \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
