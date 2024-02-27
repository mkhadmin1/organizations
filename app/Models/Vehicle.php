<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organization_id'

    ];

    public function organizations(): HasMany
    {
        return $this->hasMany(Organization::class);
    }

    public function fuelSensors(): HasMany
    {
        return $this->hasMany(FuelSensor::class);
    }
}
