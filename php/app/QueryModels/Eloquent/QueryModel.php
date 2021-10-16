<?php

namespace App\QueryModels\Eloquent;

use App\QueryModels\QueryModel as BaseQueryModel;
use Illuminate\Database\Eloquent\Builder;

interface QueryModel extends BaseQueryModel
{
    public function builder(): Builder;
}
