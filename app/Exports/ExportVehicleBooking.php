<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\VehicleBooking;

class ExportVehicleBooking implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = VehicleBooking::orderBy('user_id', 'desc')->get();
        return $data;
    }
}
