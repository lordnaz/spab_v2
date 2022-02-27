<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramApplied extends Model
{
    use HasFactory;

    protected $table = 'program_applied';
    
    protected $primaryKey = 'program_applid';
}
