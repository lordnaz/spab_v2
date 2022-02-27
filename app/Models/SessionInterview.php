<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionInterview extends Model
{
    use HasFactory;

    protected $table = 'session_interview';
    protected  $primaryKey = 'session_id';
    
    protected $fillable = [
        'center_id',
        'number_session',
        'date_session',
        'time_session',
        'place_description',
        'status',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
