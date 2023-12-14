<?php

namespace App\Services;

use App\DTO\Cars\{CreateCarDTO, UpdateCarDTO};
use App\Repositories\CarsRepositoryInterface;
use App\Repositories\PaginationInterface;
use stdClass;

class CarsServices{

    public function __construct(
        protected CarsRepositoryInterface $repository
    ){}

    public function paginate(int $page = 1, int $totalPerPage = 15, string $user_id): PaginationInterface{
        return $this->repository->paginate(page: $page, totalPerPage: $totalPerPage, user_id: $user_id);
    }

    public function findOne(string $id): stdClass | null{
        return $this->repository->findOne($id);
    }

    public function new(CreateCarDTO $dto):stdClass{
        return $this->repository->new($dto);
    }

    public function update(UpdateCarDTO $dto): stdClass | null{
        return $this->repository->update($dto);
    }

    public function delete(string $id):void{
        $this->repository->delete($id);
    }
}
