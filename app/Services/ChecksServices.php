<?php

namespace App\Services;

use App\DTO\Checks\{CreateCheckDTO, UpdateCheckDTO};
use App\Repositories\ChecksRepositoryInterface;
use App\Repositories\PaginationInterface;
use stdClass;

class ChecksServices{

    public function __construct(
        protected ChecksRepositoryInterface $repository
    ){}

    public function paginate(int $page = 1, int $totalPerPage = 15, string $car_id):PaginationInterface{
        return $this->repository->paginate(page: $page, totalPerPage: $totalPerPage, car_id: $car_id);
    }

    public function findOne(string $id): stdClass | null{
        return $this->repository->findOne($id);
    }

    public function new(CreateCheckDTO $dto):stdClass{
        return $this->repository->new($dto);
    }

    public function update(UpdateCheckDTO $dto): stdClass | null{
        return $this->repository->update($dto);
    }

    public function delete(string $id):void{
        $this->repository->delete($id);
    }
}
