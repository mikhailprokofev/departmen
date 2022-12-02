<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !empty($this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:120','nullable'],
            'email' => ['string', 'max:120','unique:employees','nullable'],
            'age' => ['integer','nullable'],
            'salary' => ['integer', 'nullable'],
            'adress' => ['string', 'max:120','nullable'],
            'experience' => ['string', 'max:120','nullable'],
            'phone' => ['string', 'max:120','nullable'],
            'job_title_id' => ['nullable'],
            'department_id' => ['nullable'],
        ];
    }
}
