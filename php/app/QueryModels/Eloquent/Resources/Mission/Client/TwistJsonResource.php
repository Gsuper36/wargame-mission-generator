<?php

namespace App\QueryModels\Eloquent\Resources\Mission\Client;

use Illuminate\Http\Resources\Json\JsonResource;

final class TwistJsonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'rules'       => $this->rules
        ];
    }
}
