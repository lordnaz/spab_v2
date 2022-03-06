<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationPermohonan extends Model
{
    use HasFactory;

    protected $table = 'qualification_permohonan';
    
    protected $primaryKey = 'permohonan_id';
}
