<?php

namespace App\Services;

use App\DTO\Users\{CreateUserDTO,UpdateUserDTO};
use App\Repositories\PaginationInterface;
use App\Repositories\UserRepositoryInterface;
use stdClass;

class UserServices{

    public function __construct(
        protected UserRepositoryInterface $repository
    ){}

    public function paginate(int $page = 1, int $totalPerPage = 15, string|null $filter = null):PaginationInterface{
        return $this->repository->paginate(page: $page, totalPerPage: $totalPerPage, filter: $filter);
    }
    public function getAll(string|null $filter):array|null{
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass | null{
        return $this->repository->findOne($id);
    }

    public function new(CreateUserDTO $dto):stdClass{
        return $this->repository->new($dto);
    }

    public function update(UpdateUserDTO $dto): stdClass | null{
        return $this->repository->update($dto);
    }

    public function delete(string $id):void{
        $this->repository->delete($id);
    }
}
