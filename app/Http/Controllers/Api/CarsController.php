<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Cars\CreateCarDTO;
use App\DTO\Cars\UpdateCarDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCars;
use App\Http\Resources\CarsResource;
use App\Services\CarsServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarsController extends Controller
{
    public function __construct(
        protected CarsServices $service
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = $request->get('user_id');
        if(!$user_id){
            return response()->json([
                'error'=>"need to inform user_id in params!"
            ], Response::HTTP_BAD_REQUEST);
        }
        $cars = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 2),
            user_id: $user_id
        );
        if(!$cars){
            return ApiAdapter::returnNotFound();
        }
        return ApiAdapter::toJson($cars);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCars $request)
    {
        $car = $this->service->new(
            CreateCarDTO::makeFromRequest($request)
        );
        return new CarsResource($car);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$car = $this->service->findOne($id)){
            return ApiAdapter::returnNotFound();
        }
        return new CarsResource($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCars $request, string $id)
    {
        $car = $this->service->update(
            UpdateCarDTO::makeFromRequest($request, $id)
        );
        if(!$car){
            return ApiAdapter::returnNotFound();
        }
        return new CarsResource($car);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$car = $this->service->findOne($id)){
            return ApiAdapter::returnNotFound();
        }
        $this->service->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
