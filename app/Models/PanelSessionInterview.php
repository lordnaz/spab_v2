<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanelSessionInterview extends Model
{
    use HasFactory;

    protected $table = 'panel_session_iv';
    protected  $primaryKey = 'panel_iv_id';
    

}
