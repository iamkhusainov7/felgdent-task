<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\{
    Group,
    User
};

class UserRegistrationRequest extends FormRequest
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
            'email' => [
                'string',
                'email',
                'max:255',
                'unique' => function ($attr, $val, $fail) {
                    if (
                        User::getUserByEmail($val)
                    ) {
                        $fail('User with this email exists!');
                    }
                }
            ],
            'firstname' => 'required|max:255',
            'surname' => 'required|max:255',
            'role' => 'required|in:admin,user',
            'bday' => 'required|date',
            'group_id' => function ($attr, $val, $fail) {
                if (
                    !Group::getGroup($val)
                ) {
                    $fail('The group does not exist!');
                }
            },
            'password' => [
                'confirmed',
                'string',
                'min:8',
            ],
        ];
    }
}
