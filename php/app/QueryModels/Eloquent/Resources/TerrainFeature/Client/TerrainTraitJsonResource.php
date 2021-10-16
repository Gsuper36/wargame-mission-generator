<?php

namespace App\QueryModels\Eloquent\Resources\TerrainFeature\Client;

use App\Models\TerrainTrait;
use Illuminate\Http\Resources\Json\JsonResource;

final class TerrainTraitJsonResource extends JsonResource
{
    public $collects = TerrainTrait::class;

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
