<?php

namespace App\Http\Controllers\Api\V1\Client;

use Illuminate\Http\Request;
use App\Models\VehicleBooking;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VehicleBookingController extends Controller
{
    public function all()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $bookings = VehicleBooking::with('vehicle')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($bookings->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No booking found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Booking found',
            'data' => $bookings,
        ], 200);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'approval_level' => 'required|enum',
            'status' => 'required|enum',
        ]);

        $booked = VehicleBooking::where('user_id', $user->id)
            ->where('vehicle_id', $request->vehicle_id)
            ->first();

        if ($booked) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have already booked this vehicle',
            ], 422);
        }

        try {
            DB::beginTransaction();
            $booking = VehicleBooking::create([
                'user_id' => $user->id,
                'vehicle_id' => $request->vehicle_id,
                'approval_level' => $request->approval_level,
                'status' => $request->status,
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Vehicle booked successfully',
                'data' => $booking,
            ], 201);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Vehicle failed to book',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }
}
