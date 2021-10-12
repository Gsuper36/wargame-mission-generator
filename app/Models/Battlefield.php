<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $title
 * @property int    $width
 * @property int    $height
 * @property int    $power_level
 * @property int    $points
 * 
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * 
 */
class Battlefield extends Model
{
    use HasFactory;

    protected $table = 'battlefield';
}
