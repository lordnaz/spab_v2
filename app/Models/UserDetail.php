<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_details';
    
    protected $fillable = [
        'user_id',
        'nric',
        'phone_no',
        'acc_trading_no',
        'bank_acc_name',
        'bank_name',
        'bank_acc_no',
        'tnc',
        'vip_status',
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


