<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\VehicleBooking;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportVehicleBooking;

class VehicleBookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.vehicle.booking.all', ["vehicle_booking" => VehicleBooking::Paginate(5), "profile" => User::find($user->id)]);
    }

    public function edit(VehicleBooking $vehicle_booking)
    {
        $user = Auth::user();
        return view('admin.vehicle.booking.edit', ["vehicle_booking" => $vehicle_booking, "vehicle_bookings" => VehicleBooking::all(), "profile" => User::find($user->id)]);
    }

    public function update(Request $request, VehicleBooking $vehicle_booking)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'vehicle_id' => 'required',
            'approval_level' => 'required',
            'status' => 'required',
        ]);
        
        $vehicle_booking->update($validateData);
        return redirect()->route('vehiclebooking.page')->with('success', 'Vehicle Booking has been review.');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportVehicleBooking, 'vehicle_booking.xlsx');
    }
}