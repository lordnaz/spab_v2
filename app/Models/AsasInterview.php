<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsasInterview extends Model
{
    use HasFactory;

    protected $table = 'asas_interview';
    
    protected $primaryKey = 'asas_id';

    protected $casts = [
        'negeri' => 'array'
    ];
}
