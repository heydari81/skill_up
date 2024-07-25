<?php

namespace Heydari81\Course\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
            //to do auth
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
            'name'=>'required|min:3|max:100|unique:courses,name',
            'slug'=>'required|min:3|max:100|unique:courses,slug',
            'category_id'=>'required|exists:categories,id',
            'teacher_id'=>'required|exists:users,id',
            'priority'=>'numeric|unique:courses,priority',
            "price" => 'required|numeric|min:0|max:10000000',
            "percent" => 'required|numeric|min:0|max:100',
            'short_body'=>'required|max:150',
            'body'=>'nullable|max:20000',
            "status" => ["required",  Rule::in(['completed','not-completed','lock'])],
            "image" => "required|mimes:jpg,png,jpeg",
        ];
    }
}
