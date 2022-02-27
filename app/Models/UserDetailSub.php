<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetailSub extends Model
{
    use HasFactory;

    protected $table = 'applicant_details_sub';
    
    protected $fillable = [
        'nric',
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


