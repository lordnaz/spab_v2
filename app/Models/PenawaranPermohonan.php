<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenawaranPermohonan extends Model
{
    use HasFactory;

    protected $table = 'penawaran_permohonan';
    protected $primaryKey = 'penawaran_permohonanid';
}
