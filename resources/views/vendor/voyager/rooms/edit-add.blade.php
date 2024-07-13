@extends('voyager::master')

@section('page_title', ($dataTypeContent->getKey() ? __('voyager.generic.edit') : __('voyager.generic.add')).' Room')

@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <form role="form"
                          class="form-edit-add"
                          action="@if($dataTypeContent->getKey()){{ route('voyager.rooms.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.rooms.store') }}@endif"
                          method="POST" enctype="multipart/form-data">
                        @if($dataTypeContent->getKey())
                            {{ method_field("PUT") }}
                        @endif
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="room_number">Room Number</label>
                            <input type="text" class="form-control" id="room_number" name="room_number" value="{{ old('room_number', $dataTypeContent->room_number ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="room_type_id">Room Type</label>
                            <select class="form-control" id="room_type_id" name="room_type_id">
                                @foreach($roomTypes as $roomType)
                                    <option value="{{ $roomType->id }}" @if(isset($dataTypeContent->room_type_id) && $dataTypeContent->room_type_id == $roomType->id) selected @endif>
                                        {{ $roomType->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="floor">Floor</label>
                            <input type="text" class="form-control" id="floor" name="floor" value="{{ old('floor', $dataTypeContent->floor ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="is_available">Available</label>
                            <input type="checkbox" id="is_available" name="is_available" @if(isset($dataTypeContent->is_available) && $dataTypeContent->is_available) checked @endif>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('voyager.generic.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
