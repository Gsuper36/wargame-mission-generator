<?php

namespace App\QueryModels\Eloquent\Resources\TerrainFeature\Client;

use Illuminate\Http\Resources\Json\ResourceCollection;

final class TerrainFeatureCollectionResource extends ResourceCollection
{
    public $collects = TerrainFeatureJsonResource::class;

    public function toArray($request)
    {
        return [
            $this->resource //@todo Сделать красивее
        ];
    }
}