@extends('voyager::master')

@section('page_title', __('voyager.generic.view').' Room')

@section('content')
<div class="page-content read container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <h4>Room Number: {{ $room->room_number }}</h4>
                    <p>Room Type: {{ $room->roomType->name }}</p>
                    <p>Floor: {{ $room->floor }}</p>
                    <p>Available: {{ $room->is_available ? 'Yes' : 'No' }}</p>
                    <a href="{{ route('voyager.rooms.index') }}" class="btn btn-primary">{{ __('voyager.generic.back') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
