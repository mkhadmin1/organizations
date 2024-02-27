<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Resources\OrganizationResource;
use App\Http\Resources\UserResource;
use App\Models\Organization;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use mysql_xdevapi\Collection;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        /** @var Organization $organizations */

        $organizations = Organization::all();
        return response()->json([
            'data' => $organizations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreOrganizationRequest $request
     * @return OrganizationResource
     */
    public function store(StoreOrganizationRequest $request): OrganizationResource
    {
        /** @param Organization $organization */
        $organization = Organization::create($request->validated());

        return new OrganizationResource($organization);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): OrganizationResource
    {
        /** @var Organization $organization */
        $organization = Organization::query()->find($id);

        return new OrganizationResource($organization);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateOrganizationRequest $request
     * @param Organization $organization
     * @return OrganizationResource
     */
    public function update(UpdateOrganizationRequest $request, Organization $organization): OrganizationResource
    {
        /** @var Organization $organization */
        $organization->update($request->validated());

        return new OrganizationResource($organization);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /** @var Organization $organization */
        $organization = Organization::query()->find($id);
        if ($organization === null) {
            return response()->json([
                'message' => 'Запись не найдена.'
            ]);
        }
        $organization->delete();

        return response()->json([
            'message' => 'Запись была успешно удалена.'
        ]);
    }
}
