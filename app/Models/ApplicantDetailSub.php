<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantDetailSub extends Model
{
    use HasFactory;

    protected $table = 'applicant_details_sub';
    protected  $primaryKey = 'application_id';
    
    protected $fillable = [
        'nric',
        'status_marriage',
        'partner_name',
        'partner_address_1',
        'partner_address_2',
        'partner_address_3',
        'partner_no_tel',
        'partner_no_phonehouse',
        'guardian_name',
        'guardian_nric_old',
        'guardian_nric_new',
        'guardian_no_tel',
        'guardian_no_phonehouse',
        'guardian_address_1',
        'guardian_address_2',
        'guardian_address_3',
        'guardian_email',
        'guardian_income',
        'relationship',
        'guardian_occupation',
        'number_of_dependents',
        'relationship_guardian',
        'kin_name',
        'kin_relationship',
        'kin_no_tel',
        'kin_no_phonehouse',
        'kin_email',
        'kin_address_1',
        'kin_address_2',
        'kin_address_3',
        'created_by',
        'modified_by',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
