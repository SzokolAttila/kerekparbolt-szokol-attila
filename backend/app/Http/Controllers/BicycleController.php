<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBicycleRequest;
use App\Http\Requests\UpdateBicycleRequest;
use App\Http\Resources\BicycleResource;
use App\Models\Bicycle;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class BicycleController extends Controller
{
    public function index() : JsonResource
    {
        return BicycleResource::collection(Bicycle::all());
    }
    public function store(StoreBicycleRequest $request) : JsonResource
    {
        return new BicycleResource(Bicycle::create($request->validated()));
    }
    public function show(int $id) : JsonResource
    {
        return new BicycleResource(Bicycle::findOrFail($id));
    }
    public function destroy(int $id) : Response
    {
        if (Bicycle::findOrFail($id)->destroy($id))
            return response()->noContent();
        return response(status: 500);
    }
    public function update(UpdateBicycleRequest $request, int $id) : JsonResource
    {
        $bicycle = Bicycle::findOrFail($id);
        $bicycle->update($request->validated());
        return new BicycleResource($bicycle);
    }
}
