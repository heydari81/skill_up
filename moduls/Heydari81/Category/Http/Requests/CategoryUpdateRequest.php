<?php

namespace Heydari81\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'title'=>'required|max:150|unique:categories,title.'. request()->route('category'),
            'slug'=>'required|max:150|unique:categories,slug.'. request()->route('category'),
            'parent_id'=>'nullable|exists:categories,id',
        ];
    }
}
