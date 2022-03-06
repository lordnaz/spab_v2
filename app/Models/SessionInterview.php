<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionInterview extends Model
{
    use HasFactory;

    protected $table = 'session_interview';
    protected  $primaryKey = 'session_id';
    
    
}
