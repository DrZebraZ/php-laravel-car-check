<?php

namespace App\DTO\Cars;
use App\Http\Requests\StoreUpdateCars;
// use App\Http\Requests\StoreUpdateUser;

class UpdateCarDTO{
    public function __construct(
        public string $id,
        public string $name,
        public string $brand,
        public int $year,
        public string $user_id
    ){}


    public static function makeFromRequest(StoreUpdateCars $request, string $id = null):self{
        return new self(
            $id ?? $request->id,
            $request->name,
            $request->brand,
            $request->year,
            $request->user_id
        );
    }

}
