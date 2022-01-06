<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    
    protected $fillable = [
        'trx_id',
        'amount_sent',
        'amount_receive',
        'trading_no',
        'receipt_url',
        'notified',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
