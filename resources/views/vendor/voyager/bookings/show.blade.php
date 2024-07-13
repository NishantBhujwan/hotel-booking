@extends('voyager::master')

@section('page_title', 'Viewing Booking')

@section('content')
<div class="page-content read container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-bordered">
                <!-- form start -->
                <div class="panel-body">
                    <div class="form-group">
                        <label for="customer_name">Customer Name</label>
                        <p>{{ $booking->customer->first_name." ".$booking->customer->last_name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="customer_name">Contact</label>
                        <p>{{ $booking->customer->phone_number }}</p>
                    </div>
                    <div class="form-group">
                        <label for="customer_name">Email</label>
                        <p>{{ $booking->customer->email }}</p>
                    </div>
                    <div class="form-group">
                        <label for="room_number">Room Number</label>
                        <p>{{ $booking->room->room_number }}</p>
                    </div>
                    <div class="form-group">
                        <label for="check_in_date">Check-In Date</label>
                        <p>{{ $booking->check_in_date }}</p>
                    </div>
                    <div class="form-group">
                        <label for="check_out_date">Check-Out Date</label>
                        <p>{{ $booking->check_out_date }}</p>
                    </div>
                    <div class="form-group">
                        <label for="total_amount">Total Amount</label>
                        <p>{{ $booking->total_amount }}</p>
                    </div>
                    <div class="form-group">
                        <label for="booking_date">Booking Date</label>
                        <p>{{ $booking->booking_date }}</p>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <p>{{ ucfirst($booking->status) }}</p>
                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div><!-- col-md-8 -->

        <div class="col-md-4">
            <div class="panel panel-bordered panel-warning">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <a href="{{ route('voyager.bookings.edit', $booking->id) }}" class="btn btn-warning">
                                <i class="voyager-edit"></i> Edit
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('voyager.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="voyager-trash"></i> Delete
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- col-md-4 -->
    </div><!-- row -->
</div><!-- container-fluid -->
@endsection
