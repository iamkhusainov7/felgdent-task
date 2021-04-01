<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\{Group};

class GroupCRUDRequest extends FormRequest
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
            'group-name' => [
                'required',
                'max:255',
                'unique' => function ($attr, $val, $fail) {

                    if (
                        Group::exists($val)
                    ) {
                        if ($this->method() === 'PUT') {
                            $entity = $this->route('group', null);

                            if (
                                $entity->name === $val
                            ) {
                                return;
                            }
                        }

                        $fail("The data already exist in database!");
                    }
                }
            ]
        ];
    }
}
