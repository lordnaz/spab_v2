<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramQualification extends Model
{
    use HasFactory;

    protected $table = 'program_qualification';
    protected  $primaryKey = 'pqualification_id';

    protected $hidden = [
        'pqualification_id',
    ];

}
