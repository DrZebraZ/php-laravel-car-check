<?php

namespace App\Repositories;

use App\DTO\Users\{CreateUserDTO, UpdateUserDTO};
use stdClass;

interface UserRepositoryInterface{
    public function paginate(int $page = 1, int $totalPerPage = 15, string|null $filter = null): PaginationInterface;
    public function getAll(string|null $filter = null):array|null;
    public function findOne(string $id): stdClass | null;
    public function new(CreateUserDTO $dto):stdClass;
    public function update(UpdateUserDTO $dto): stdClass | null;
    public function delete(string $id):void;
}
