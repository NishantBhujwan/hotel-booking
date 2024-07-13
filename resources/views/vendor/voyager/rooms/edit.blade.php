@extends('voyager::master')

@section('page_title', __('voyager::generic.edit').' Room')

@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <form action="{{ route('voyager.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="room_number">Room Number</label>
                            <input type="text" class="form-control" id="room_number" name="room_number" value="{{ $room->room_number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="room_type_id">Room Type</label>
                            <select class="form-control" name="room_type_id" id="room_type_id" required>
                                @foreach($roomTypes as $roomType)
                                <option value="{{ $roomType->id }}" {{ $room->room_type_id == $roomType->id ? 'selected' : '' }}>{{ $roomType->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="floor">Floor</label>
                            <input type="text" class="form-control" id="floor" name="floor" value="{{ $room->floor }}" required>
                        </div>
                        <div class="form-group">
                            <label for="is_available">Available</label>
                            <select class="form-control" name="is_available" id="is_available" required>
                                <option value="1" {{ $room->is_available ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$room->is_available ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="images">Room Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('voyager::generic.update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
