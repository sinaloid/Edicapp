<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Countries\Commune;

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
        $commune_id = Commune::where('commune_name',$input['commune'])->first();
        $commune_id = isset($commune_id) ? $commune_id->id : '';
        $input['commune'] = $commune_id;
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'mobile' => ['required','numeric','digits:8','starts_with: 5,6,7,01,07',Rule::unique(User::class),],
            'commune' => ['required', 'integer'],
        ]
        )->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'mobile' => $input['mobile'],
            'commune_id' => $input['commune'],
        ]);
    }
}