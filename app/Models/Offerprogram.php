<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offerprogram extends Model
{
    use HasFactory;

    protected $table = 'offerprogram';
    protected  $primaryKey = 'offerprogram_id';

    protected $fillable = [
        'program_id',
        'mode',
        'notes',
        'quota',
        'quota_semasa',
        'registration_date',
        'registration_time',
        'registration_venue',
        'status_aktif',
        'status_validate',
        'qualification_text',
        'status',
        'created_by',
    ];

    protected $hidden = [
        'offerprogram_id',
    ];
}
