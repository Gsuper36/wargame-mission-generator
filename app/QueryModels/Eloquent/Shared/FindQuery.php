<?php

namespace App\QueryModels\Eloquent\Shared;

use App\QueryModels\Eloquent\QueryModel;
use App\QueryModels\Eloquent\Traits\Query;
use JsonSerializable;

abstract class FindQuery implements QueryModel
{
    use Query;

    public function results(...$args): JsonSerializable
    {
        $query  = $this->builder();
        $params = $this->resolvedParams($args);

        $this->filtrate($query, $params);

        if ($this->jsonResource) {
            return $this->jsonResource::make($query->get());
        }

        return $query->get();
    }

    protected function resolvedParams(array $args): array
    {
        if (empty($args)) {
            return $this->requestData();
        }

        return array_merge($this->requestData(), $this->validatedParams($args));
    }
}
