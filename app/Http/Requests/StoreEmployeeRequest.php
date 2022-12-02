<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name' => ['string', 'max:120'],
            'email' => ['string', 'max:120','unique:employees'],
            'age' => ['integer'],
            'salary' => ['integer', 'nullable'],
            'adress' => ['string', 'max:120'],
            'experience' => ['string', 'max:120'],
            'phone' => ['string', 'max:120'],
            'job_title_id' => ['nullable'],
            'department_id' => ['nullable'],
        ];
    }
}