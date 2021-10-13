<?php

namespace App\QueryModels\Eloquent\Resources\Mission;

use App\Models\Mission;
use Illuminate\Http\Resources\Json\JsonResource;

final class MissionJsonResource extends JsonResource
{
    public $collects = Mission::class;

    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'rules'       => $this->rules,
            'twist'       => $this->twist->toArray(),
            'deployment'  => $this->deployment->toArray(),
            'battlefield' => $this->battlefield->toArray(),
            'objectives'  => $this->objectives->toArray()
        ];
    }
}
