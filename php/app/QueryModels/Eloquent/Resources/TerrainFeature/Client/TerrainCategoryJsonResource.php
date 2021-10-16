<?php

namespace App\QueryModels\Eloquent\Resources\TerrainFeature\Client;

use Illuminate\Http\Resources\Json\JsonResource;

final class TerrainCategoryJsonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'rules'       => $this->rules,
            'rules_short' => $this->rules_short
        ];
    }
}
