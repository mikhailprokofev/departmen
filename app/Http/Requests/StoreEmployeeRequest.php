<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Остановить валидацию после первой неуспешной проверки.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

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
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'string', 'max:120','unique:employees'],
            'age' => ['required', 'integer'],
            'salary' => ['integer', 'nullable'],
            'adress' => ['required', 'string', 'max:120'],
            'experience' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:120'],
            'job_title_id' => ['nullable'],
            'department_id' => ['nullable'],
        ];
    }
}