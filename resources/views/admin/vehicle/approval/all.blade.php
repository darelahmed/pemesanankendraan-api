@extends('admin.dashboard')
@section('container')
    <center>
        <h1 class="text-muted text-uppercase mt-4">Vehicle Approval</h1>
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
                <th scope="col">Vehicle Booking ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <div class="row">
                <div class="col-lg-7 mb-3">
                    <a class="btn btn-outline-primary mt-3" href="create">Add Approval</a>
                </div>
                @if ($vehicle_approval->count())
                    @foreach ($vehicle_approval as $vehicle_approvals)
                        <tr>
                            <th scope="row">{{ $vehicle_approvals->id }}</th>
                            <td>{{ $vehicle_approvals->vehicle_booking_id }}</td>
                            <td>{{ $vehicle_approvals->user_id }}</td>
                            <td>
                                <a href="{{ route('editapproval.page', $vehicle_approvals->id) }}"
                                    class="btn btn-sm btn-outline-success">Edit</a>
                                <form action="{{ route('vehicleapproval.delete', $vehicle_approvals->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Kamu yakin mau hapus ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Data Tidak Ditemukan</td>
                    </tr>
                @endif
            </div>
        </tbody>
    </table>
    <div class="d-flex">
        {{ $vehicle_approval->links() }}
    </div>
@endsection
