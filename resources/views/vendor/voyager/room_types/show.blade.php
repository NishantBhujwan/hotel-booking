@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' Room Type')

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <p><strong>Type Name:</strong> {{ $roomType->type_name }}</p>
                    <p><strong>Description:</strong> {{ $roomType->description }}</p>
                    <p><strong>Price Per Night:</strong> {{ $roomType->price_per_night }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
