<?php

namespace App\QueryModels\Eloquent\Shared;

use App\QueryModels\Eloquent\QueryModel;
use App\QueryModels\Eloquent\Traits\Query;
use JsonSerializable;

abstract class ReadQuery implements QueryModel
{
    use Query;

    public function __construct(string $jsonResource = null)
    {
        $this->jsonResource = $jsonResource;
    }

    public function results(...$args): JsonSerializable
    {
        $id    = $args[0];
        $query = $this->builder();

        if ($this->jsonResource) {
            return $this->jsonResource::make($query->findOrFail($id));
        }

        return $query->findOrFail($id);
    }
}
