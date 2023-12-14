<?php

namespace App\Repositories;

use App\DTO\Cars\{CreateCarDTO, UpdateCarDTO};
use App\Models\Cars;
use App\Repositories\CarsRepositoryInterface;
use stdClass;

class CarsEloquentORM implements CarsRepositoryInterface{

    public function __construct(
        protected Cars $model
    ){}

    public function paginate(int $page = 1, int $totalPerPage = 15, string $user_id): PaginationInterface{
        $cars = $this->model->where(function($query) use ($user_id){
            if($user_id){
                $query->where('user_id','=',"{$user_id}");
            }
        })
        ->orderBy('brand')
        ->paginate($totalPerPage, ['*'], 'page', $page);
        return new PaginationPresenter($cars);
    }

    public function findOne(string $id): stdClass | null{
        $cars = $this->model->find($id);
        if(!$cars){
            return null;
        }
        return (object) $cars->toArray();
    }

    public function new(CreateCarDTO $dto):stdClass{
        $cars = $this->model->create(
            (array) $dto
        );
        return (object) $cars->toArray();
    }

    public function update(UpdateCarDTO $dto): stdClass | null{
        if(!$cars = $this->model->find($dto->id)){
            return null;
        }
        $cars->update(
            (array) $dto
        );
        return (object) $cars->toArray();
    }

    public function delete(string $id):void{
        $this->model->findOrFail($id)->delete();
    }

}
