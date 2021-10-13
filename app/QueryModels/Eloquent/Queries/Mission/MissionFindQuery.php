<?php

namespace App\QueryModels\Eloquent\Queries\Mission;

use App\Models\Mission;
use App\QueryModels\Eloquent\Shared\FindQuery;
use Illuminate\Database\Eloquent\Builder;

final class MissionFindQuery extends FindQuery
{
    protected string $model = Mission::class;
    protected array  $rules = [
        'title'          => 'sometimes|string|max:256',
        'battlefield_id' => 'sometimes|integer|min:1'
    ];

    protected function filters(): array
    {
        return [
            'title' => function (Builder $query, $title) {
                $query->whereRaw('title ilike ?', ["'{$title}'"]);
            },
            'battlefield_id' => function (Builder $query, $id) {
                $query->where('battlefield_id', $id);
            }
        ];
    }

    public function builder(): Builder
    {
        return parent::builder()
            ->with([
                'battlefield',
                'deployment',
                'twist',
                'objectives'
            ])
            ->has('objectives');
    }
}
