<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int         $id
 * @property string      $title
 * @property string      $rules
 * @property string|null $name
 * 
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * 
 */
class TerrainTrait extends Model
{
    use HasFactory;

    protected $table = 'terrain_trait';
}
