<?php

namespace App\Repositories;

use App\DTO\Cars\{CreateCarDTO, UpdateCarDTO};
use stdClass;

interface CarsRepositoryInterface{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $user_id): PaginationInterface;
    public function findOne(string $id): stdClass | null;
    public function new(CreateCarDTO $dto):stdClass;
    public function update(UpdateCarDTO $dto): stdClass | null;
    public function delete(string $id):void;
}
