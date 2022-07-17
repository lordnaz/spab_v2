<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarIntake extends Model
{
    use HasFactory;

    protected $table = 'daftar_intake';
    protected  $primaryKey = 'daftar_id';
}
