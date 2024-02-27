<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        /** @var Vehicle $vehicles */
        $vehicles = Vehicle::all();

        return response()->json([
            'data' => $vehicles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request): VehicleResource
    {
        /** @var Vehicle $vehicle */
        $vehicle = Vehicle::create($request->validated());

        return new VehicleResource($vehicle);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): VehicleResource
    {
        /** @var Vehicle $vehicle */
        $vehicle = Vehicle::query()->find($id);

        return new VehicleResource($vehicle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle): VehicleResource
    {
        $vehicle->update($request->validated());

        return new VehicleResource($vehicle);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        /** @var Vehicle $vehicle */
        $vehicle = Vehicle::query()->find($id);

        if ($vehicle === null) {
            return response()->json([
                'message' => 'Запись не найдена.'
            ]);
        }
        $vehicle->delete();

        return response()->json([
            'message' => 'Запись была успешно удалена.'
        ]);
    }
}
