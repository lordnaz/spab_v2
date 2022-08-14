<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $table = 'user_information';
    protected  $primaryKey = 'information_id';

    protected $fillable = [
        'user_detailsid',
        'nric',
        'phone_no',
        'acc_trading_no',
        'bank_acc_name',
        'bank_name',
        'bank_acc_no',
        'tnc',
        'vip_status',
        'created_at',
        'created_by',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
