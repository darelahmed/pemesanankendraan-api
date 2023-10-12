@extends('admin.dashboard')
@section('container')
<center>
    <h1 class="text-muted text-uppercase mt-4 mb-4">Review Vehicle Booking</h1>
</center>
<div class="col-lg-20">
    <form method="POST" action="{{ route('review.post', ['vehicle_booking' => $vehicle_booking->id]) }}">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="text" class="form-control d-flex p-2" id="user_id" name="user_id"
                value="{{ $vehicle_booking->user_id }}">
        </div>
        <div class="mb-3">
            <label for="vehicle_id" class="form-label">Vehicle ID</label>
            <input type="text" class="form-control d-flex p-2" id="vehicle_id" name="vehicle_id"
                value="{{ $vehicle_booking->vehicle_id }}">
        </div>
        <div class="mb-3">
            <label for="approval_level" class="form-label">Approval Level</label>
            <select class="form-select" aria-label="Default select example" id="approval_level" name="approval_level"
                value="{{ $vehicle_booking->approval_level }}">
                <option selected>Choose Approval Level</option>
                <option value="Pending">Pending</option>
                <option value="Bad">Bad</option>
                <option value="Normal">Normal</option>
                <option value="Good">Good</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" id="status" name="status"
                value="{{ $vehicle_booking->status }}">
                <option selected>Choose Approval Status</option>
                <option value="Pending">Pending</option>
                <option value="Accepted">Accepted</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
</div>
@endsection