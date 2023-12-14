<?php

namespace App\DTO\Users;
// use App\Enums\UserGender;
use App\Http\Requests\StoreUpdateUser;

class UpdateUserDTO{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public int $age,
        public string $gender
         // public UserGender $gender
    ){}


    public static function makeFromRequest(StoreUpdateUser $request, string $id = null):self{
        return new self(
            $id ?? $request->id,
            $request->name,
            $request->email,
            $request->age,
            $request->gender
        );
    }

}
