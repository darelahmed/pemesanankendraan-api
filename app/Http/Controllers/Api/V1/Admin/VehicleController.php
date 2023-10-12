<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.vehicle.all', ["vehicle" => Vehicle::Paginate(5), "profile" => User::find($user->id)]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('admin.vehicle.create', ["vehicle" => Vehicle::all(), "profile" => User::find($user->id)]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'vehicle_name' => 'required',
            'driver_name' => 'required',
            'fuel_consumption' => 'required',
            'service_schedule' => 'required',
        ]);
        Vehicle::create($validateData);
        return redirect()->route('vehicle.page')->with('success', 'Vehicle created successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        Vehicle::destroy($vehicle->id);
        return redirect()->route('vehicle.page')->with('success', 'Vehicle deleted successfully.');
    }

    public function edit(Vehicle $vehicle)
    {
        $user = Auth::user();
        return view('admin.vehicle.edit', ["vehicle" => $vehicle, "vehicles" => Vehicle::all(), "profile" => User::find($user->id)]);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validateData = $request->validate([
            'vehicle_name' => 'required',
            'driver_name' => 'required',
            'fuel_consumption' => 'required',
            'service_schedule' => 'required',
        ]);
        Vehicle::where('id', $vehicle->id)->update($validateData);
        return redirect()->route('vehicle.page')->with('success', 'Vehicle updated successfully.');
    }
}
