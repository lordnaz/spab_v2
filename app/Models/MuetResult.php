<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuetResult extends Model
{
    use HasFactory;

    protected $table = 'muet_result';
    
    protected $primaryKey = 'muet_id';
}
