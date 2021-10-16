<?php

namespace App\QueryModels\Eloquent\Shared;

use App\QueryModels\Eloquent\QueryModel;
use App\QueryModels\Eloquent\Traits\Query;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
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
            return $this->resolvedResource($query->paginate());
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

    protected function resolvedResource($items): JsonResource
    {
        if (is_subclass_of($this->jsonResource, ResourceCollection::class)) {
            return new $this->jsonResource($items);
        }

        return $this->jsonResource::collection($items);
    }
}
