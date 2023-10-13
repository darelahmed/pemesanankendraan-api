<?php

namespace App\Http\Controllers\Api\V1\Client;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    public function all()
    {
        $vehicle = Vehicle::all();
        if($vehicle == null){
            return response()->json([
                'message' => 'No vehicle found',
            ], 404);
        } else {
            try {
                return response()->json([
                    'message' => 'Vehicle found',
                    'data' => $vehicle,
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Something went wrong',
                ], 500);
            }
        }
    }
}
