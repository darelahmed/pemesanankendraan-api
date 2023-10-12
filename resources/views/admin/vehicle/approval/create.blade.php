@extends('admin.dashboard')
@section('container')
<center>
    <h1 class="text-muted text-uppercase mt-4">Add Approval</h1>
</center>
<div class="col-lg-20">
    <form method="POST" action="{{ route('createapproval.post') }}">
        @csrf
        <div class="mb-3">
            <label for="vehicle_booking_id" class="form-label">Vehicle Booking ID</label>
            <input type="text" class="form-control d-flex p-2" id="vehicle_booking_id" name="vehicle_booking_id"
                value="{{ old('vehicle_booking_id') }}">
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="text" class="form-control d-flex p-2" id="user_id" name="user_id"
                value="{{ old('user_id') }}">
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
@endsection