<?php

namespace App\Actions\Fortify;

use App\Models\User;
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
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
    'name' => ['required', 'string', 'regex:/^[A-Za-z ]+$/'],
    'email' => ['required', 'email', 'ends_with:@gmail.com', 'unique:users,email'],
    'phone' => ['required', 'digits:10'],
    'address' => ['required', 'string', 'min:5'],
    'password' => ['required', 'string', 'min:8', 'confirmed'],
], [
    'name.required' => 'Please enter your full name (letters only).',
    'name.regex' => 'Name can only contain letters and spaces.',
    'email.required' => 'Enter your email address.',
    'email.email' => 'Enter a valid email address.',
    'email.ends_with' => 'Email must end with @gmail.com.',
    'email.unique' => 'This email is already registered.',
    'phone.required' => 'Enter your phone number.',
    'phone.digits' => 'Phone number must be exactly 10 digits.',
    'address.required' => 'Enter your address.',
    'address.min' => 'Address should be at least 5 characters.',
    'password.required' => 'Enter a password.',
    'password.min' => 'Password must be at least 8 characters long.',
    'password.confirmed' => 'Password confirmation does not match.',
])->validate();


        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
