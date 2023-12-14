<?php

namespace App\DTO\Checks;
use App\Http\Requests\{StoreUpdateChecks};
use DateTime;

// use App\Http\Requests\StoreUpdateUser;

class UpdateCheckDTO{
    public function __construct(
        public string $id,
        public string $car_id,
        public string|null $exterior,
        public string|null $interior,
        public string|null $mechanical,
        public string|null $electrical,
        public string|null $oil,
        public string|null $tires,
        public DateTime $scheduled
    ){}


    public static function makeFromRequest(StoreUpdateChecks $request, string $id = null):self{
        $scheduled = new DateTime($request->scheduled);
        $checked = new self(
            $id ?? $request->get('id', ''),
            $request->get('car_id',''),
            $request->get('exterior', ''),
            $request->get('interior', ''),
            $request->get('mechanical', ''),
            $request->get('electrical', ''),
            $request->get('oil', ''),
            $request->get('tires', ''),
            $scheduled,
        );
        return $checked;
    }
}
