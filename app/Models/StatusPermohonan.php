<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPermohonan extends Model
{
    use HasFactory;

    protected $table = 'all_status_permohonan';
    
    protected $primaryKey = 'status_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
