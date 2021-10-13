<?php

namespace App\QueryModels\Eloquent\Traits;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait Query
{
    protected string  $model;
    protected ?string $jsonResource;
    protected array   $rules;
    protected array   $filters;
    
    private array $requestData;

    /**
     * @return array
     */
    protected function rules(): array
    {
        return $this->rules;
    }

    /**
     * @return array
     */
    protected function filters(): array
    {
        return $this->filters;
    }

    /**
     * @return array
     */
    protected final function requestData(): array
    {
        return $this->requestData;
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        return $this->model::query();
    }

    /**
     * @param Builder $query
     * @param array $data
     * @return void
     */
    protected function filtrate(Builder $query, array $data): void
    {
        foreach (array_intersect($this->filters(), $data) as $key => $callable) {
            $this->ensureIsCallable($callable);

            $query->when($data[$key], $callable);
        }
    }

    /**
     * @throws Exception
     *
     * @param mixed $callable
     * @return void
     */
    private function ensureIsCallbale($callable): void
    {
        if (! is_callable($callable)) {
            throw new Exception("Filter value must be callable");
        }
    }

    /**
     * @throws ValidationException
     *
     * @param array $params
     * @return array
     */
    protected function validatedParams(array $params): array
    {
        $validator = Validator::make($params, $this->rules());

        $validator->validate();

        return $validator->validated();
    }

    /**
     * @param Request $request
     * @param string $jsonResource
     */
    public function __construct(Request $request, string $jsonResource = null)
    {
        $this->requestData  = $this->validatedParams($request->all());
        $this->jsonResource = $jsonResource;
    }
}
