<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanelInterview extends Model
{
    use HasFactory;

    protected $table = 'interview_panel';
    protected  $primaryKey = 'id_panel';
    
    protected $fillable = [
        'no_ic',
        'panel_name',
        'panel_position',
        'panel_faculty',
        'address_1',
        'address_2',
        'address_3',
        'tel_house',
        'tel_phone',
        'panel_email',
        'description',
        'status',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
