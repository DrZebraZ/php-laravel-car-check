<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Users\CreateUserDTO;
use App\DTO\Users\UpdateUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Http\Resources\UserResource;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(
        protected UserServices $service
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Método padrão laravel
        // $users = User::paginate();
        // return UserResource::collection($users);

        $users = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 2),
            filter: $request->get('filter',null)
        );
        if(!$users){
            return ApiAdapter::returnNotFound();
        }
        return ApiAdapter::toJson($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateUser $request)
    {
        $user = $this->service->new(
            CreateUserDTO::makeFromRequest($request)
        );
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$user = $this->service->findOne($id)){
            return ApiAdapter::returnNotFound();
        }
        return new UserResource($user);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateUser $request, string $id)
    {
        $user = $this->service->update(
            UpdateUserDTO::makeFromRequest($request, $id)
        );
        if(!$user){
            return ApiAdapter::returnNotFound();
        }
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$user = $this->service->findOne($id)){
            return ApiAdapter::returnNotFound();
        }
        $this->service->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
