<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionInterview extends Model
{
    use HasFactory;

    protected $table = 'panel_session_iv';
    protected  $primaryKey = 'panel_iv_id';
    
    protected $fillable = [
        'session_id',
        'panel_name',
        'description',
        'created_by',
        'created_at',
    ];
}
