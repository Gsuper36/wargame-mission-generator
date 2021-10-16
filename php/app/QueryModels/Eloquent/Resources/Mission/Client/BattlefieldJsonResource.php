<?php

namespace App\QueryModels\Eloquent\Resources\Mission\Client;

use Illuminate\Http\Resources\Json\JsonResource;

final class BattlefieldJsonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'width'       => $this->width,
            'height'      => $this->height,
            'power_level' => $this->power_level,
            'points'      => $this->points
        ];
    }
}
