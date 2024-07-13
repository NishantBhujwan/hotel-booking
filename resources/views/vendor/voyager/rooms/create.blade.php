@extends('voyager::master')

@section('page_title', __('voyager::generic.add_new').' Room')

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <form action="{{ route('voyager.rooms.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="room_number">Room Number</label>
                            <input type="text" class="form-control" name="room_number" id="room_number" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price_per_night">Price per Night</label>
                            <input type="number" class="form-control" name="price_per_night" id="price_per_night" required>
                        </div>
                        <div class="form-group">
                            <label for="room_type_id">Room Type</label>
                            <select class="form-control" name="room_type_id" id="room_type_id" required>
                                @foreach($roomTypes as $roomType)
                                    <option value="{{ $roomType->id }}">{{ $roomType->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" class="form-control" name="images[]" id="images" multiple required>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('voyager::generic.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
