<?php

namespace App\QueryModels\Eloquent\Resources\TerrainFeature\Client;

use Illuminate\Http\Resources\Json\JsonResource;

final class TerrainFeatureReadJsonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'category'    => TerrainCategoryJsonResource::make($this->whenLoaded('category')),
            'description' => $this->description,
            'rules'       => $this->rules,
            'rules_short' => $this->rules_short,
            'traits'      => TerrainTraitJsonResource::collection($this->whenLoaded('terrainTraits'))
        ];
    }
}
