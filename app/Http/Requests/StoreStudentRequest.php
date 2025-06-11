<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        
            'lrn_number'                            =>                   'nullable|string|unique:students,lrn_number',
            'student_id_number'                     =>                   'required|string|unique:students,student_id_number',
            'first_name'                            =>                   'required|string|max:255',
            'middle_name'                           =>                   'nullable|string|max:255',
            'last_name'                             =>                   'required|string|max:255',
            'suffix'                                =>                   'nullable|string|max:20',
            'date_of_birth'                         =>                   'required|date|before:today',
            'gender'                                =>                   'required|in:male,female',
            'year_level'                            =>                   'required|in:pre-elementary,elementary,junior_high,senior_high',
            'status'                                =>                   'required|string',
            'contact_number'                        =>                   'nullable|string|max:20',
            'is_discounted'                         =>                   'sometimes|boolean',
            'address'                               =>                   'nullable|string',
                                        
            // Foreign keys                             
            'created_by_user_id'                    =>                   'nullable|exists:users,id',
            'current_academic_year_id'              =>                   'nullable|exists:academic_years,id',

        ];
    }
}
