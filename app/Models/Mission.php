<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int      $id
 * @property int      $deployment_id
 * @property int|null $twist_id
 * @property int      $battlefield_id
 * @property string   $title
 * @property string   $description
 * @property string   $rules
 * 
 * @property \App\Models\Deployment  $deployment
 * @property \App\Models\Twist|null  $twist
 * @property \App\Models\Battlefield $battlefield
 * @property \Illuminate\Database\Eloquent\Collection $objectives
 * @property \Illuminate\Database\Eloquent\Collection $terrainFeatures
 * 
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * 
 */
class Mission extends Model
{
    use HasFactory;

    protected $table = 'mission';

    public function deployment(): HasOne
    {
        return $this->hasOne(Deployment::class, 'deployment_id', 'id');
    }

    public function twist(): HasOne
    {
        return $this->hasOne(Twist::class, 'twist_id', 'id');
    }

    public function battlefield(): HasOne
    {
        return $this->hasOne(Battlefield::class, 'battlefield_id', 'id');
    }

    public function objectives(): BelongsToMany
    {
        return $this->belongsToMany(
            Objective::class, 
            'objective_mission', 
            'mission_id', 
            'objective_id'
        )->withPivot(['primary']);
    }

    public function terrainFeatures(): BelongsToMany
    {
        return $this->belongsToMany(
            TerrainFeature::class,
            'mission_terrain_feature',
            'mission_id',
            'terrain_feature_id'
        )->withPivot(['x', 'y']);
    }
}
