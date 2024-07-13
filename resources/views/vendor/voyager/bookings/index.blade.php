@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' Bookings')

@section('content')
<div class="page-content browse container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Room Number</th>
                                <th>Customer Name</th>
                                <th>Check-in Date</th>
                                <th>Check-out Date</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->room->room_number }}</td>
                                <td>{{ $booking->customer->first_name." ".$booking->customer->last_name }}</td>
                                <td>{{ $booking->check_in_date }}</td>
                                <td>{{ $booking->check_out_date }}</td>
                                <td>{{ $booking->total_amount }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>
                                    <a href="{{ route('voyager.bookings.show', $booking->id) }}" class="btn btn-info">
                                        <i class="voyager-eye"></i> View
                                    </a>
                                    <a href="{{ route('voyager.bookings.edit', $booking->id) }}" class="btn btn-warning">
                                        <i class="voyager-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('voyager.bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="voyager-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <a href="{{ route('voyager.bookings.create') }}" class="btn btn-primary">
                        <i class="voyager-plus"></i> Add New Booking
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
