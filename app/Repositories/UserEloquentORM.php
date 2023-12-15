<?php

namespace App\Repositories;

use App\DTO\Users\{CreateUserDTO, UpdateUserDTO};
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use stdClass;

class UserEloquentORM implements UserRepositoryInterface{

    public function __construct(
        protected User $model
    ){}

    public function paginate(int $page = 1, int $totalPerPage = 15, string|null $filter = null): PaginationInterface{
        $users = $this->model
                ->where(function($query) use ($filter){
                    if($filter){
                        $query->where('name','like',"%{$filter}%");
                        $query->orWhere('email','like',"%{$filter}%");
                    }
                })
                ->orderBy('name')
                ->paginate($totalPerPage, ['*'], 'page', $page);
        return new PaginationPresenter($users);
    }
    public function getAll(string|null $filter = null):array|null{
        return $this->model
                        ->where(function ($query) use ($filter){
                            if($filter){
                                $query->where('name', 'like', "%{$filter}%");
                                $query->orWhere('email', 'like', "%{$filter}%");
                            }
                        })
                        ->get()
                        ->toArray();
    }
    public function findOne(string $id): stdClass | null{
        $user = $this->model->find($id);
        if(!$user){
            return null;
        }
        return (object) $user->toArray();
    }
    public function new(CreateUserDTO $dto):stdClass{
        $user = $this->model->create(
            (array) $dto
        );
        return (object) $user->toArray();
    }
    public function update(UpdateUserDTO $dto): stdClass | null{
        if(!$user = $this->model->find($dto->id)){
            return null;
        }
        $user->update(
            (array) $dto
        );
        return (object) $user->toArray();
    }
    public function delete(string $id):void{
        $this->model->findOrFail($id)->delete();
    }
}
