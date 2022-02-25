<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorDetails extends Model
{
    use HasFactory;

    protected $table = 'sponsorship_details';
    
    protected $primaryKey = 'sponsor_id';
}
