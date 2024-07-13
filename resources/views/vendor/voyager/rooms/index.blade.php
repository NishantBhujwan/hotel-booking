@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' Rooms')

@section('content')
<div class="page-content browse container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <form action="{{ route('voyager.rooms.destroyMultiple') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Room Number</th>
                                    <th>Room Type</th>
                                    <th>Floor</th>
                                    <th>Available</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="room_ids[]" value="{{ $room->id }}">
                                    </td>
                                    <td>{{ $room->room_number }}</td>
                                    <td>{{ $room->roomType->type_name }}</td>
                                    <td>{{ $room->floor }}</td>
                                    <td>{{ $room->is_available ? 'Yes' : 'No' }}</td>
                                    <td>
                                        @foreach($room->images as $image)
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Room Image" style="max-width: 100px;">
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('voyager.rooms.show', $room->id) }}" class="btn btn-info">
                                            <i class="voyager-eye"></i> View
                                        </a>
                                        <a href="{{ route('voyager.rooms.edit', $room->id) }}" class="btn btn-warning">
                                            <i class="voyager-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('voyager.rooms.destroy', $room->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this room?');">
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
                        <button type="submit" class="btn btn-danger">
                            <i class="voyager-trash"></i> Delete Selected Rooms
                        </button>
                    </form>
                </div>
                <div class="panel-footer">
                    <a href="{{ route('voyager.rooms.create') }}" class="btn btn-primary">
                        <i class="voyager-plus"></i> Add New Room
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
