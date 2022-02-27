<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreeningIV extends Model
{
    use HasFactory;

    protected $table = 'screening_interview';
    protected  $primaryKey = 'screening_id';
}
