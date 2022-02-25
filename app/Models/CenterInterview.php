<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterInterview extends Model
{
    use HasFactory;

    protected $table = 'interview_center';
    protected  $primaryKey = 'center_id';
    
    protected $fillable = [
        'code_center',
        'name_center',
        'address_center_1',
        'address_center_2',
        'address_center_3',
        'tel_no_center',
        'fax_no_center',
        'officer_center',
        'position_officer_center',
        'description_center',
        'status_center',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
}
