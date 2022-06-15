<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherCourseRequest extends FormRequest
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
        if($this->method()=='POST'){
            return [
                'courses_id' => [
                    'required',
                    'exists:courses,id',
                    Rule::unique('teachers_courses')->whereNull('deleted_at')],
                'user_id' => 'required|exists:users,id'
            ];
        }
        if($this->method()=='DELETE'){
            return [
                'courses_id' => 'required|exists:courses,id',
                'user_id' => 'required|exists:users,id'
            ];
        }
        
        
    }
}
