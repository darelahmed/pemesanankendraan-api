<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\User;
use App\Models\VehicleBooking;
use App\Models\VehicleApproval;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VehicleApprovalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.vehicle.approval.all', ["vehicle_approval" => VehicleApproval::Paginate(5), "profile" => User::find($user->id)]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('admin.vehicle.approval.create', ["vehicle_approval" => VehicleApproval::all(), "profile" => User::find($user->id)]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'vehicle_booking_id' => 'required',
            'user_id' => 'required',
        ]);
        VehicleApproval::create($validateData);
        return redirect()->route('vehicleapproval.page')->with('success', 'Vehicle Approval created successfully.');
    }

    public function destroy(VehicleApproval $vehicle_approval)
    {
        VehicleApproval::destroy($vehicle_approval->id);
        return redirect()->route('vehicleapproval.page')->with('success', 'Vehicle Approval deleted successfully.');
    }

    public function edit(VehicleApproval $vehicle_approval)
    {
        $user = Auth::user();
        return view('admin.vehicle.approval.edit', ["vehicle_approval" => $vehicle_approval, "vehicle_approvals" => VehicleApproval::all(), "profile" => User::find($user->id)]);
    }

    public function update(Request $request, VehicleApproval $vehicle_approval)
    {
        $validateData = $request->validate([
            'vehicle_booking_id' => 'required',
            'user_id' => 'required',
        ]);
        VehicleApproval::where('id', $vehicle_approval->id)->update($validateData);
        return redirect()->route('vehicleapproval.page')->with('success', 'Vehicle Approval updated successfully.');
    }
}
