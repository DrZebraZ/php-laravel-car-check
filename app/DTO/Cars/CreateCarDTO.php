<?php

namespace App\DTO\Cars;
use App\Http\Requests\StoreUpdateCars;
// use App\Http\Requests\StoreUpdateUser;

class CreateCarDTO{
    public function __construct(
        public string $name,
        public string $brand,
        public int $year,
        public string $user_id
    ){}


    public static function makeFromRequest(StoreUpdateCars $request):self{
        return new self(
            $request->name,
            $request->brand,
            $request->year,
            $request->user_id
        );
    }

}
