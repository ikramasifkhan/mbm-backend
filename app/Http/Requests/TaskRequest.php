<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string|unique:tasks,title',
            'description'=>'required|string',
            'deadline'=>'required|date',
        ];
    }
	
	protected function failedValidation(Validator $validator)
    {
        response()->sendValidationErrorResponse($validator->errors());
    }
}
