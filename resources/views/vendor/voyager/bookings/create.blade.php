@extends('voyager::master')

@section('page_title', __('voyager.generic.add_new').' Booking')

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('voyager.bookings.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="customer_id">Customer</label>
                            <select class="form-control" name="customer_id" id="customer_id" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->first_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="room_id">Room</label>
                            <select class="form-control" name="room_id" id="room_id" required>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}" data-rate="{{ $room->roomType->price_per_night }}">
                                        {{ $room->room_number }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="check_in_date">Check-in Date</label>
                            <input type="date" class="form-control" name="check_in_date" id="check_in_date" required>
                        </div>
                        <div class="form-group">
                            <label for="check_out_date">Check-out Date</label>
                            <input type="date" class="form-control" name="check_out_date" id="check_out_date" required>
                        </div>
                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="number" class="form-control" name="total_amount" id="total_amount" readonly>
                        </div>
                        <div class="form-group">
                            <label for="booking_date">Booking Date</label>
                            <input type="date" class="form-control" name="booking_date" id="booking_date" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="cancelled">Cancelled</option>
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

@section('javascript')
<script>
    $(document).ready(function() {
        function calculateTotalAmount() {
            var checkInDate = $('#check_in_date').val();
            var checkOutDate = $('#check_out_date').val();
            var roomRate = $('#room_id').find(':selected').data('rate');

            if (checkInDate && checkOutDate && roomRate) {
                var checkInDateObj = new Date(checkInDate);
                var checkOutDateObj = new Date(checkOutDate);
                var timeDifference = checkOutDateObj - checkInDateObj;

                if (timeDifference > 0) {
                    var days = timeDifference / (1000 * 3600 * 24);
                    $('#total_amount').val(days * roomRate);
                } else {
                    $('#total_amount').val(0);
                }
            } else {
                $('#total_amount').val(0);
            }
        }

        $('#check_in_date, #check_out_date, #room_id').change(calculateTotalAmount);
    });
</script>
@endsection
