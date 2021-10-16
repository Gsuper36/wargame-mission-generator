<?php

namespace App\QueryModels\Eloquent\Resources\Mission\Client;

use Illuminate\Http\Resources\Json\JsonResource;

final class DeploymentJsonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'              => $this->id,
            'player_a_points' => $this->player_a_points,
            'player_b_points' => $this->player_b_points,
            'distance_points' => $this->distance_points
        ];
    }
}
