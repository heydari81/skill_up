<?php

namespace Heydari81\Course\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LessonStoreRequest extends FormRequest
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
            'title'=>'required|min:3|max:100',
            'season_id'=>'required|exists:seasons,id',
            'body'=>'nullable|max:20000',
            "free" => ["required", Rule::in([0,1])],
            "status" => ["required",  Rule::in(['unlock','lock'])],
            "media" => "required|mimes:jpg,png,jpeg,mp4,mkv,avi,zip,pdf,tar,rar",
        ];
    }
}
