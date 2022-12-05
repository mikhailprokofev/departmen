<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobTitleRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:120', 'unique:job_titles'],
            'description' => ['required', 'string', 'max:1000'],
            'job_description' => ['required', 'string', 'max:1000', 'nullable'],
            'base_salary' => ['required', 'integer', 'nullable'],
            'department_id' => ['nullable']
        ];
    }
}
