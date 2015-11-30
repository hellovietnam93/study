<?php

namespace studyhub\Http\Requests;

class SemesterRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|max:10|unique:semesters'
        ];
    }
}
