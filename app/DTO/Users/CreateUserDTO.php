<?php

namespace App\DTO\Users;
// use App\Enums\UserGender;
use App\Http\Requests\StoreUpdateUser;

class CreateUserDTO{
    public function __construct(
        public string $name,
        public string $email,
        public int $age,
        public string $gender
        // public UserGender $gender
    ){}


    public static function makeFromRequest(StoreUpdateUser $request):self{
        return new self(
            $request->name,
            $request->email,
            $request->age,
            $request->gender
        );
    }

}
