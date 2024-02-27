<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FuelSensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vehicle_id'
    ];


    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
