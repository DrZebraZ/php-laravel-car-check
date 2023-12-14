<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChecksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'car_id'=>$this->car_id,
            'exterior'=>$this->exterior,
            'interior'=>$this->interior,
            'mechanical'=>$this->mechanical,
            'electical'=>$this->electrical,
            'oil'=>$this->oil,
            'tires'=>$this->tires,
            'scheduled'=>$this->scheduled,
            'created' => Carbon::make($this->created_at)->format('d-m-Y'),
        ];
    }
}
