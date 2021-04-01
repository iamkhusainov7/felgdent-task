<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\{Group};

class EditUserRequest extends UserRegistrationRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role' => 'required|in:admin,user',
            'firstname' => 'required|max:255',
            'surname' => 'required|max:255',
            'bday' => 'required|date',
            'group_id' => function ($attr, $val, $fail) {
                if (
                    !Group::getGroup($val)
                ) {
                    $fail('The group does not exist!');
                }
            },
            'admin-password' => [
                'required',
                function ($attr, $val, $fail) {
                    $admin = Auth::user();

                    if (
                        !Hash::check(
                            $val,
                            $admin->password
                        )
                    ) {
                        $fail('Incorrect password!');
                    }
                }
            ],
            'password' => [
                'confirmed',
                'string',
                'min:8',
            ]
        ];
    }
}
