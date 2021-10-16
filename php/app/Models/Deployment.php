<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int   $id
 * @property array $player_a_points
 * @property array $player_b_points
 * @property array $distance_points
 * 
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * 
 */
class Deployment extends Model
{
    use HasFactory;

    protected $table = 'deployment';
}
