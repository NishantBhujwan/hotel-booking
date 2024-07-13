@extends('voyager::master')

@section('page_title', __('voyager::generic.add_new').' Review')

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <form action="{{ route('voyager.reviews.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="customer_id">Customer</label>
                            <select class="form-control" name="customer_id" id="customer_id" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="room_id">Room</label>
                            <select class="form-control" name="room_id" id="room_id" required>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" name="comment" id="comment" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="review_date">Review Date</label>
                            <input type="date" class="form-control" name="review_date" id="review_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
