<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NearEarthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'  => $this->id,
            'reference'  => $this->reference,
            'name'  => $this->name,
            'is_hazardous'  => $this->is_hazardous,
            'speed'  => $this->speed,
            'date'  => $this->date,
            'created_at'  => $this->created_at,
        ];
    }
}
