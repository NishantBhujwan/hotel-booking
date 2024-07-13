<?php

@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' Rooms')

@section('content')
<div class="page-content browse container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Room Number</th>
                                <th>Room Type</th>
                                <th>Floor</th>
                                <th>Available</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                            <tr>
                                <td>{{ $room->room_number }}</td>
                                <td>{{ $room->roomType->name }}</td>
                                <td>{{ $room->floor }}</td>
                                <td>{{ $room->is_available ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('voyager.rooms.show', $room->id) }}" class="btn btn-info">
                                        <i class="voyager-eye"></i> View
                                    </a>
                                    <a href="{{ route('voyager.rooms.edit', $room->id) }}" class="btn btn-warning">
                                        <i class="voyager-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('voyager.rooms.destroy', $room->id) }}" method="POST" style="display:inline-block;">
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
