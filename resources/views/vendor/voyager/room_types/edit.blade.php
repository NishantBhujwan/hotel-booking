@extends('voyager::master')

@section('page_title', __('voyager.generic.edit').' Room Type')

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <form action="{{ route('voyager.room-types.update', $roomType->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="type_name">Type Name</label>
                            <input type="text" class="form-control" name="type_name" id="type_name" value="{{ $roomType->type_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{ $roomType->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price_per_night">Price Per Night</label>
                            <input type="number" class="form-control" name="price_per_night" id="price_per_night" value="{{ $roomType->price_per_night }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
