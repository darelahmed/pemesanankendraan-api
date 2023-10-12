@extends('admin.dashboard')
@section('container')
    <center>
        <h1 class="text-muted text-uppercase mt-4">Add Another Vehicle</h1>
    </center>
    <div class="col-lg-20">
        <form method="POST" action="{{ route('create.post') }}">
            @csrf
            <div class="mb-3">
                <label for="vehicle_name" class="form-label">Vehicle Name</label>
                <input type="text" class="form-control d-flex p-2" id="vehicle_name" name="vehicle_name"
                    value="{{ old('vehicle_name') }}">
            </div>
            <div class="mb-3">
                <label for="driver_name" class="form-label">Driver Name</label>
                <input type="text" class="form-control d-flex p-2" id="driver_name" name="driver_name"
                    value="{{ old('driver_name') }}">
            </div>
            <div class="mb-3">
                <label for="fuel_consumption" class="form-label">Fuel Consumption</label>
                <input type="text" class="form-control d-flex p-2" id="fuel_consumption" name="fuel_consumption"
                    value="{{ old('fuel_consumption') }}">
            </div>
            <div class="mb-3">
                <label for="service_schedule" class="form-label">Service Schedule</label>
                <select class="form-select" aria-label="Default select example" id="service_schedule"
                    name="service_schedule" value="{{ old('service_schedule') }}">
                    <option selected>Choose Service Schedule</option>
                    <option value="Daily">Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </form>
    </div>
@endsection
