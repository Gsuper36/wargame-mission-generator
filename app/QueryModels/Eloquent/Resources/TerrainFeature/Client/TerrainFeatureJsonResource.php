<?php

namespace App\QueryModels\Eloquent\Resources\TerrainFeature\Client;

use App\Models\TerrainFeature;
use Illuminate\Http\Resources\Json\JsonResource;

final class TerrainFeatureJsonResource extends JsonResource
{
    public $collects = TerrainFeature::class;

    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'category'    => $this->category->title,
            'description' => $this->description,
            'rules'       => $this->rules,
            'rules_short' => $this->rules_short,
            'traits'      => $this->terrainTraits->pluck('title')->toArray()
        ];
    }
}