@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' Review')

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="form-group">
                        <label>Customer Name</label>
                        <p>{{ $review->customer->full_name }}</p>
                    </div>
                    <div class="form-group">
                        <label>Room</label>
                        <p>{{ $review->room->room_number }}</p>
                    </div>
                    <div class="form-group">
                        <label>Comment</label>
                        <p>{{ $review->comment }}</p>
                    </div>
                    <div class="form-group">
                        <label>Review Date</label>
                        <p>{{ $review->review_date }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
