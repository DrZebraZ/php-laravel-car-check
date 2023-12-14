<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Cars\{CreateCarDTO, UpdateCarDTO};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCars;
use App\Services\CarsServices;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function __construct(
        protected CarsServices $service
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
       //
    }

    public function create(string $user_id){
        return view('admin/cars/create', compact('user_id'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCars $request){

        $this->service->new(
            CreateCarDTO::makeFromRequest($request)
        );
        return redirect()->route('user.show', $request->user_id);
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
        if(!$cars = $this->service->findOne($id)){
            return redirect()->back();
        }
        return view('admin/cars/edit', compact('cars'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCars $request){
        $cars = $this->service->update(
            UpdateCarDTO::makeFromRequest($request)
        );
        if (!$cars){
            return back();
        }

        return redirect()->route('user.show', $cars->user_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $car = $this->service->findOne($id);
        $this->service->delete($id);
        return redirect()->route('user.show', $car->user_id);
    }
}
