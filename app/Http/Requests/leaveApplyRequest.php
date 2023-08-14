<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class leaveApplyRequest extends FormRequest
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
            //
            'leave_type_id'=>['required','exists:leave_types,id'],
            'start_date'=>['required','date','before:end_date'],
            'end_date'=>['required','date','after:start_date'],
            'employee_comments'=>['nullable','string','max:500']
        ];
    }
}
