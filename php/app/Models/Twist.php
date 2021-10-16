<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int     $id
 * @property string $title
 * @property string $description
 * @property string $rules
 * 
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * 
 */
class Twist extends Model
{
    use HasFactory;

    protected $table = 'twist';
}
