<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppplicantIVSession extends Model
{
    use HasFactory;

    protected $table = 'applicant_iv_session';
    protected  $primaryKey = 'id';
    
    protected $fillable = [
        'nric',
        'center_id',
        'iv_place_selected',
        'number_session',
        'date_session',
        'time_session',
        'description_admin',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
}
