<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManufacturerRequest;
use App\Http\Requests\UpdateManufacturerRequest;
use App\Http\Resources\ManufacturerResource;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ManufacturerController extends Controller
{
    public function index() : JsonResource
    {
        return ManufacturerResource::collection(Manufacturer::all());
    }
    public function store(StoreManufacturerRequest $request) : JsonResource
    {
        return new ManufacturerResource(Manufacturer::create($request->validated()));
    }
    public function show(int $id) : JsonResource
    {
        return new ManufacturerResource(Manufacturer::findOrFail($id));
    }
    public function update(UpdateManufacturerRequest $request, int $id) : JsonResource
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->update($request->validated());
        return new ManufacturerResource($manufacturer);
    }

    public function destroy(int $id) : Response
    {
        if (Manufacturer::findOrFail($id)->destroy($id))
            return response()->noContent();
        return response(status: 500);
    }
}
