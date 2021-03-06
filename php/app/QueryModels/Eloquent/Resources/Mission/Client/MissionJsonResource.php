<?php

namespace App\QueryModels\Eloquent\Resources\Mission\Client;

use App\Models\Mission;
use Illuminate\Http\Resources\Json\JsonResource;

final class MissionJsonResource extends JsonResource
{
    public $collects    = Mission::class;
    public static $wrap = 'results';

    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'rules'       => $this->rules,
            'twist'       => TwistJsonResource::make($this->whenLoaded('twist')),
            'deployment'  => DeploymentJsonResource::make($this->whenLoaded('deployment')),
            'battlefield' => BattlefieldJsonResource::make($this->whenLoaded('battlefield')),
            'objectives'  => ObjectiveJsonResource::collection($this->whenLoaded('objectives')),
            'terrain'     => TerrainFeatureJsonResource::collection($this->whenLoaded('terrainFeatures'))
        ];
    }
}
