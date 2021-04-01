<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyAccountUpdateRequest extends FormRequest
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
            'old-password' => [
                'required',
                'string',
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
            'firstname' => 'required|max:255',
            'surname' => 'required|max:255',
            'bday' => 'required|date',
            'new-password' => [
                'confirmed',
                'string',
                'min:8',
            ],
        ];
    }
}
