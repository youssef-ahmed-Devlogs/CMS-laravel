<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|min:5|max:20',
            'description' => 'required|min:10|max:30',
            'content' => 'required|min:50|max:4000',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required'
        ];
    }
}
