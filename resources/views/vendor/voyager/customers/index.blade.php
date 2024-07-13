@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' Customers')

@section('content')
<div class="page-content browse container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <table id="dataTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->first_name }}</td>
                                <td>{{ $customer->last_name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone_number }}</td>
                                <td>
                                    <a href="{{ route('voyager.customers.show', $customer->id) }}" class="btn btn-info">
                                        <i class="voyager-eye"></i> View
                                    </a>
                                    <a href="{{ route('voyager.customers.edit', $customer->id) }}" class="btn btn-warning">
                                        <i class="voyager-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('voyager.customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this customer?');">
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
                    <a href="{{ route('voyager.customers.create') }}" class="btn btn-primary">
                        <i class="voyager-plus"></i> Add New Customer
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
