<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ScoreRequest extends FormRequest
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
            'student_id' => 'required|exists:students,id',
            'course_id' => [
                'required',
                Rule::exists('courses','id')->whereNull('deleted_at'),
                Rule::unique('scores')
                ->where('course_id',$this->course_id)
                ->where('student_id',$this->student_id)],
            'score' => 'required|numeric|between:0,10'
        ];
    }
}
