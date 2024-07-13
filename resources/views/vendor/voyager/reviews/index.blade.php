@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' Reviews')

@section('content')
<div class="page-content browse container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Room</th>
                                <th>Comment</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $review)
                            <tr>
                                <td>{{ $review->customer->full_name }}</td>
                                <td>{{ $review->room->room_number }}</td>
                                <td>{{ $review->comment }}</td>
                                <td>{{ $review->review_date }}</td>
                                <td>
                                    <a href="{{ route('voyager.reviews.show', $review->id) }}" class="btn btn-info">
                                        <i class="voyager-eye"></i> View
                                    </a>
                                    <a href="{{ route('voyager.reviews.edit', $review->id) }}" class="btn btn-warning">
                                        <i class="voyager-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('voyager.reviews.destroy', $review->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this review?');">
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
                    <a href="{{ route('voyager.reviews.create') }}" class="btn btn-primary">
                        <i class="voyager-plus"></i> Add New Review
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
