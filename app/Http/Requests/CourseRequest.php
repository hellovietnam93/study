<?php

namespace studyhub\Http\Requests;

class CourseRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required',
            'name' => 'required|min:6',
            'description' => 'required|min:5',
            'credit' => 'required',
            'credit_fee' => 'required',
            'theory_duration' => 'required',
            'exercise_duration' => 'required',
            'practice_duration' => 'required',
            'weight' => 'required',
            'en_name' => 'required',
            'abbr_name' => 'required',
            'language' => 'required',
            'evaluation' => 'required'
        ];
    }
}
