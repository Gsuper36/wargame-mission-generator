<?php

namespace App\QueryModels\Eloquent\Queries\TerrainFeature;

use App\Models\TerrainFeature;
use App\QueryModels\Eloquent\Shared\FindQuery;
use Illuminate\Database\Eloquent\Builder;

final class TerrainFeatureFindQuery extends FindQuery
{
    protected string $model = TerrainFeature::class;

    protected function rules(): array
    {
        return [
            'title'       => 'sometimes|string|max:126',
            'category_id' => 'sometimes|integer|min:1',
            'traits'      => 'sometimes|required|array',
            'traits.*'    => 'sometimes|required|integer|min:0'
        ];
    }

    protected function filters(): array
    {
        return [
            'title' => function (Builder $query, $title) {
                $query->whereRaw('title ilike ?', ["'{$title}'"]);
            },
            'category_id' => function (Builder $query, $category) {
                $query->where('category_id', $category);
            },
            'traits' => function (Builder $query, $traits) {
                $query->whereHas('terrainTraits', function ($query) use ($traits) {
                    $query->whereIn('id', $traits);
                });
            }
        ];
    }

    public function builder(): Builder
    {
        return parent::builder()->with([
            'terrainTraits',
            'category'
        ]);
    }
}
