<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int         $id
 * @property string      $title
 * @property int         $category_id
 * @property string      $description
 * @property string      $rules
 * @property string|null $rules_short
 * 
 * @property \Carbon\Carbon $creatted_at
 * @property \Carbon\Carbon $updated_at
 */
class TerrainFeature extends Model
{
    use HasFactory;

    protected $table = 'terrain_feature';
}
