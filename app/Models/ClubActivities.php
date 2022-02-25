<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubActivities extends Model
{
    use HasFactory;

    protected $table = 'club_activities';
    
    protected $primaryKey = 'club_id';
}
