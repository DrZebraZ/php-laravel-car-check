<?php

namespace App\Repositories;

use App\DTO\Checks\{CreateCheckDTO, UpdateCheckDTO};
use stdClass;

interface ChecksRepositoryInterface{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $car_id = null): PaginationInterface;
    public function findOne(string $id): stdClass | null;
    public function new(CreateCheckDTO $dto):stdClass;
    public function update(UpdateCheckDTO $dto): stdClass | null;
    public function delete(string $id):void;
}
