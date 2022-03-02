<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultInterview extends Model
{
    use HasFactory;

    protected $table = 'result_interview_applicant';
    protected  $primaryKey = 'result_id';
}
