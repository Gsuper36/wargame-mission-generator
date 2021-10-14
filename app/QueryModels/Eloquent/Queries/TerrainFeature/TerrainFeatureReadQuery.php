<?php

namespace App\QueryModels\Eloquent\Queries\TerrainFeature;

use App\Models\TerrainFeature;
use App\QueryModels\Eloquent\Shared\ReadQuery;
use Illuminate\Database\Eloquent\Builder;

final class TerrainFeatureReadQuery extends ReadQuery
{
    protected string $model = TerrainFeature::class;

    public function builder(): Builder
    {
        return parent::builder()
            ->with([
                'category',
                'terrainTraits'
        ]);
    }
}
