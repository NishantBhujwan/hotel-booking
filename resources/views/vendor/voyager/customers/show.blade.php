@extends('voyager::master')

@section('page_title', __('voyager.generic.view').' Customer')

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <p>{{ $customer->first_name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <p>{{ $customer->last_name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <p>{{ $customer->email }}</p>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <p>{{ $customer->phone_number }}</p>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <p>{{ $customer->address }}</p>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <p>{{ $customer->date_of_birth }}</p>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <p>{{ ucfirst($customer->gender) }}</p>
                    </div>
                    <a href="{{ route('voyager.customers.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('voyager.customers.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
