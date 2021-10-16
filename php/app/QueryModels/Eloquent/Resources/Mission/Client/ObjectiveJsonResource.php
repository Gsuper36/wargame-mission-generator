<?php

namespace App\QueryModels\Eloquent\Resources\Mission\Client;

use App\Models\Objective;
use Illuminate\Http\Resources\Json\JsonResource;

final class ObjectiveJsonResource extends JsonResource
{
    public $collects = Objective::class;

    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'rules_text'  => $this->rules_text,
            'primary'     => $this->whenPivotLoaded('objective_mission', function () {
                return $this->pivot->primary;
            }, false),
            'rules_data'  => $this->rules_data
        ];
    }
}
