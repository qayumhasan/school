<?php

namespace App;

use App\Vehicle;
use Illuminate\Database\Eloquent\Model;

class RouteVehicle extends Model
{
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
