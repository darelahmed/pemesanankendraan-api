@extends('admin.dashboard')
@section('container')
    <center>
        <h1 class="text-muted text-uppercase mt-4 mb-4">Vehicle Booking</h1>
    </center>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Vehicle ID</th>
                <th scope="col">Approval Level</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <div class="row">
                <div class="col-lg-7 mb-3">
                    <a class="btn btn-outline-success mt-3" href="{{ route('export.page') }}">Download Data</a>
                </div>
                @if ($vehicle_booking->count())
                    @foreach ($vehicle_booking as $vehicle_bookings)
                        <tr>
                            <th scope="row">{{ $vehicle_bookings->id }}</th>
                            <td>{{ $vehicle_bookings->user_id }}</td>
                            <td>{{ $vehicle_bookings->vehicle_id }}</td>
                            <td>{{ $vehicle_bookings->approval_level }}</td>
                            <td>{{ $vehicle_bookings->status }}</td>
                            <td>
                                <a href="{{ route('review.page', $vehicle_bookings->id) }}"
                                    class="btn btn-sm btn-outline-success">Review</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr></tr>
                    <td colspan="6" class="text-center">Data Tidak Ditemukan</td>
                    </tr>
                @endif
            </div>
        </tbody>
    </table>
    <div class="d-flex">
        {{ $vehicle_booking->links() }}
    </div>
@endsection
