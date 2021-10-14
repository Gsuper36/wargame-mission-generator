<?php

namespace App\QueryModels\Eloquent\Queries\Mission;

use App\Models\Mission;
use App\QueryModels\Eloquent\Shared\ReadQuery;
use Illuminate\Database\Eloquent\Builder;

final class MissionReadQuery extends ReadQuery
{
    protected string $model = Mission::class;

    public function builder(): Builder
    {
        return parent::builder()
            ->with([
                'battlefield',
                'deployment',
                'twist',
                'objectives',
                'terrainFeatures'
        ]);
    }
}
