<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtInvolve extends Model
{
    use HasFactory;

    protected $table = 'art_involvements';
    
    protected $primaryKey = 'art_id';
}
