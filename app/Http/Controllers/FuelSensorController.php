<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFuelSensorRequest;
use App\Http\Requests\UpdateFuelSensorRequest;
use App\Http\Resources\FuelSensorResource;
use App\Models\FuelSensor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FuelSensorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var FuelSensor $fuelSensor */

        $fuelSensor = FuelSensor::all();

        return response()->json([
            'data' => $fuelSensor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreFuelSensorRequest $request
     * @return FuelSensorResource
     */
    public function store(StoreFuelSensorRequest $request): FuelSensorResource
    {
        /** @var FuelSensor $fuelSensor */
        $fuelSensor = FuelSensor::create($request->validated());

        return new FuelSensorResource($fuelSensor);
    }

    /**
     * Display the specified resource.
     */

    public function show(int $id)
    {
        /** @var FuelSensor $fuelSensor */

        /** @var FuelSensor $fuelSensor */
        $fuelSensor = FuelSensor::query()->find($id);
        return new FuelSensorResource($fuelSensor);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateFuelSensorRequest $request
     * @param FuelSensor $fuelSensor
     * @return FuelSensorResource
     */
    public function update(UpdateFuelSensorRequest $request, FuelSensor $fuelSensor): FuelSensorResource
    {
        $fuelSensor->update($request->validated());

        return new FuelSensorResource($fuelSensor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fuelSensor = FuelSensor::query()->find($id);
        if ($fuelSensor === null) {
            return response()->json([
                'message' => 'Запись не найдена.'
            ]);
        }
        $fuelSensor->delete();

        return response()->json([
            'message' => 'Запись была успешно удалена.'
        ]);
    }
}
