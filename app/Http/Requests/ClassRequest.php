<?php

namespace studyhub\Http\Requests;

class ClassRequest extends Request
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
            'semester' => 'required|max:10',
            'max_student' => 'required',
            'type' => 'required|max:5'
        ];
    }
}
