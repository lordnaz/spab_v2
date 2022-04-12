<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\ApplicantDetailSub;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

   
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'nric' => ['required', 'string', 'min:12', 'max:12'],
            'phoneno' => ['required', 'string', 'min:10', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $create = new User();
        $create->name = $input['name'];
        $create->email = $input['email'];
        $create->password = Hash::make($input['password']);
        $create->save();
        // $create->id;

        $userId = $create->id;

        if($userId){
            $details = UserDetail::create([
                'user_id' => $userId,
                'name' => $input['name'],
                'nric' => $input['nric'],
                // 'status' => "CALON",
                'phone_no' => $input['phoneno'],
                'created_by' => $userId,
                'modified_by' => $userId,
                // 'password' => Hash::make($input['password']),
            ]);
    
            $details = ApplicantDetailSub::create([
                'nric' => $input['nric'],
                // 'status' => "CALON",
                'created_by' => $userId,
                'modified_by' => $userId,
            ]);
        }

        return $create;
    }
}
