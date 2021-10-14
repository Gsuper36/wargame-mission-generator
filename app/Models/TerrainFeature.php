<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int         $id
 * @property string      $title
 * @property int         $category_id
 * @property string      $description
 * @property string      $rules
 * @property string|null $rules_short
 * 
 * @property \App\Models\TerrainCategory $category
 * @property \Illuminate\Database\Eloquent\Collection $terrainTraits
 * 
 * @property \Carbon\Carbon $creatted_at
 * @property \Carbon\Carbon $updated_at
 */
class TerrainFeature extends Model
{
    use HasFactory;

    protected $table = 'terrain_feature';

    public function category(): BelongsTo
    {
        return $this->belongsTo(TerrainCategory::class, 'category_id', 'id');
    }

    public function terrainTraits(): BelongsToMany
    {
        return $this->belongsToMany(
            TerrainTrait::class,
            'terrain_trait_feature',
            'terrain_feature_id',
            'terrain_trait_id'
        );
    }
}
