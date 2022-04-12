<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_details';
    protected  $primaryKey = 'user_detailsid';
    
    protected $fillable = [
        'nric',
        'name',
        'phone_no',
        'created_by',
        'modified_by',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


