<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Checks\{CreateCheckDTO, UpdateCheckDTO};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateChecks;
use App\Services\CarsServices;
use App\Services\ChecksServices;
use Illuminate\Http\Request;

class ChecksController extends Controller
{
    public function __construct(
        protected ChecksServices $service,
        protected CarsServices $carService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(string $id, Request $request){
        $checks = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 1),
            car_id: $id
        );
        $filters = ['car_id'=>$id];
        $car = $this->carService->findOne($id);
        return view('admin/checks/index', compact('checks', 'filters', 'car'));
    }

    public function create(string $car_id){
        return view('admin/checks/create', compact('car_id'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateChecks $request){
        $this->service->new(
            CreateCheckDTO::makeFromRequest($request)
        );
        return redirect()->route('checks.index', $request->get('car_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){

        if(!$cars = $this->service->findOne($id)){
            return redirect()->back();
        }
        return view('admin/cars/show', compact('cars'));
    }

    public function edit(string $id){
        if(!$check = $this->service->findOne($id)){
            return redirect()->back();
        }
        return view('admin/checks/edit', compact('check'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, StoreUpdateChecks $request){
        $request['id']=$id;
        $checks = $this->service->update(
            UpdateCheckDTO::makeFromRequest($request)
        );
        if (!$checks){
            return back();
        }

        return redirect()->route('checks.index', $checks->car_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $check = $this->service->findOne($id);
        $this->service->delete($id);
        return redirect()->route('checks.index', $check->car_id);
    }
}
