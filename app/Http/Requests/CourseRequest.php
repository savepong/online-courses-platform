<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        $rules = [
            'title' => 'required',
            'slug'  => 'required|unique:courses',
            'description' => 'required',
            // 'published_at' => 'date_format:Y-m-d H:i:s',
            'author_id' => 'required',
            'category_id' => 'required',
            'image' => 'mimes:jpg,jpeg,bmp,png',
        ];

        switch($this->method()){
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required';
                // $rules['slug'] = 'required|unique:courses,slug,' . $this->route('course');
                break;
        }

        return $rules;
    }
}
