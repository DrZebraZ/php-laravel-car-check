<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Checks\CreateCheckDTO;
use App\DTO\Checks\UpdateCheckDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateChecks;
use App\Http\Resources\ChecksResource;
use App\Services\ChecksServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChecksController extends Controller
{
    public function __construct(
        protected ChecksServices $service
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $car_id = $request->get('car_id');
        if(!$car_id){
            return response()->json([
                'error'=>"need to inform car_id in params!"
            ], Response::HTTP_BAD_REQUEST);
        }
        $checks = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 1),
            car_id: $car_id
        );
        if(!$checks){
            return ApiAdapter::returnNotFound();
        }
        return ApiAdapter::toJson($checks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateChecks $request)
    {
        $check = $this->service->new(
            CreateCheckDTO::makeFromRequest($request)
        );
        return new ChecksResource($check);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$check = $this->service->findOne($id)){
            return ApiAdapter::returnNotFound();
        }
        return new ChecksResource($check);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateChecks $request, string $id)
    {
        $check = $this->service->update(
            UpdateCheckDTO::makeFromRequest($request, $id)
        );
        if(!$check){
            return ApiAdapter::returnNotFound();
        }
        return new ChecksResource($check);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$check = $this->service->findOne($id)){
            return ApiAdapter::returnNotFound();
        }
        $this->service->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
