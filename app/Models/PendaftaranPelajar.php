<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranPelajar extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_pelajar';
    protected $primaryKey = 'pendaftaran_id';
}
