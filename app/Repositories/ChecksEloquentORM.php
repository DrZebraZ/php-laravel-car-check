<?php

namespace App\Repositories;

use App\DTO\Checks\{CreateCheckDTO, UpdateCheckDTO};
use App\Models\Check;
use stdClass;

class ChecksEloquentORM implements ChecksRepositoryInterface{

    public function __construct(
        protected Check $model
    ){}

    public function paginate(int $page = 1, int $totalPerPage = 15, string $car_id = null): PaginationInterface{
        $checks = $this->model
                ->where(function($query) use ($car_id){
                    if($car_id){
                        $query->where('car_id','=',"{$car_id}");
                    }
                })
                ->orderByDesc('scheduled')
                ->paginate($totalPerPage, ['*'], 'page', $page);
        return new PaginationPresenter($checks);
    }

    public function findOne(string $id): stdClass | null{
        $checks = $this->model->find($id);
        if(!$checks){
            return null;
        }
        return (object) $checks->toArray();
    }

    public function new(CreateCheckDTO $dto):stdClass{
        $checks = $this->model->create(
            (array) $dto
        );
        return (object) $checks->toArray();
    }

    public function update(UpdateCheckDTO $dto): stdClass | null{
        if(!$checks = $this->model->find($dto->id)){
            return null;
        }
        $checks->update(
            (array) $dto
        );
        return (object) $checks->toArray();
    }

    public function delete(string $id):void{
        $this->model->findOrFail($id)->delete();
    }


}
