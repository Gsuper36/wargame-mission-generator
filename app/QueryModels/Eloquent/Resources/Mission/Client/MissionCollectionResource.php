<?php

namespace App\QueryModels\Eloquent\Resources\Mission\Client;

use Illuminate\Http\Resources\Json\ResourceCollection;

final class MissionCollectionResource extends ResourceCollection
{
    public $collects = MissionJsonResource::class;

    public function toArray($request)
    {
        return [
            $this->resource //@todo Сделать красивее
        ];
    }
}
