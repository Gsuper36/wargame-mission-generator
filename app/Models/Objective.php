<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int         $id
 * @property string      $title
 * @property string      $description
 * @property string      $rules_text
 * @property array|null  $rules_data
 * 
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Objective extends Model
{
    use HasFactory;

    protected $table = 'objective';
}
