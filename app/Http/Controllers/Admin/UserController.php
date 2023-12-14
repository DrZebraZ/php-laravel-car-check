<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Users\{CreateUserDTO, UpdateUserDTO};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Models\Cars;
use App\Services\CarsServices;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected UserServices $service,
        protected CarsServices $carService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $users = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 5),
            filter: $request->get('filter',null)
        );
        $filters = ['filter'=>$request->get('filter' ,'')];
        return view('admin/users/index', compact('users', 'filters'));
    }

    public function create(){
        return view('admin/users/create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateUser $request){

        $this->service->new(
            CreateUserDTO::makeFromRequest($request)
        );
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request){

        if(!$user = $this->service->findOne($id)){
            return redirect()->back();
        }
        $cars = $this->carService->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 1),
            user_id: $id);
        return view('admin/users/show', compact('user','cars'));
    }

    public function edit(string $id){
        // if(!$user = $user->find($id)){
        if(!$user = $this->service->findOne($id)){
            return redirect()->back();
        }
        return view('admin/users/edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateUser $request, string|int $id){
        $user = $this->service->update(
            UpdateUserDTO::makeFromRequest($request)
        );
        if (!$user){
            return back();
        }

        return redirect()->route('user.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $this->service->delete($id);
        return redirect()->route('user.index');
    }
}
