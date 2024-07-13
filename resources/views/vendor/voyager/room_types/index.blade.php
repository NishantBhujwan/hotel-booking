@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' Room Types')

@section('content')
<div class="page-content browse container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Type Name</th>
                                <th>Description</th>
                                <th>Price Per Night</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roomTypes as $index => $roomType)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $roomType->type_name }}</td>
                                <td>{{ $roomType->description }}</td>
                                <td>{{ $roomType->price_per_night }}</td>
                                <td>
                                    <a href="{{ route('voyager.room-types.show', $roomType->id) }}" class="btn btn-info">
                                        <i class="voyager-eye"></i> View
                                    </a>
                                    <a href="{{ route('voyager.room-types.edit', $roomType->id) }}" class="btn btn-warning">
                                        <i class="voyager-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('voyager.room-types.destroy', $roomType->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this room type?');">
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
                    <a href="{{ route('voyager.room-types.create') }}" class="btn btn-primary">
                        <i class="voyager-plus"></i> Add New Room Type
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
