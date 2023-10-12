@extends('admin.dashboard')
@section('container')
    <center>
        <h1 class="text-muted text-uppercase mt-4">Vehicle</h1>
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
                <th scope="col">Vehicle Name</th>
                <th scope="col">Driver Name</th>
                <th scope="col">Fuel Consumption</th>
                <th scope="col">Service Schedule</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <div class="row">
                <div class="col-lg-7 mb-3">
                    <a class="btn btn-outline-primary mt-3" href="create">Add Vehicle</a>
                </div>
                @if ($vehicle->count())
                    @foreach ($vehicle as $vehicles)
                        <tr>
                            <th scope="row">{{ $vehicles->id }}</th>
                            <td>{{ $vehicles->vehicle_name }}</td>
                            <td>{{ $vehicles->driver_name }}</td>
                            <td>{{ $vehicles->fuel_consumption }}</td>
                            <td>{{ $vehicles->service_schedule }}</td>
                            <td>
                                <a href="{{ route('edit.page', $vehicles->id) }}"
                                    class="btn btn-sm btn-outline-success">Edit</a>
                                <form action="{{ route('vehicle.delete', $vehicles->id) }}" method="POST" class="d-inline">
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
        {{ $vehicle->links() }}
    </div>
@endsection
