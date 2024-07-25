<?php

namespace Heydari81\User\Http\Requests;

use App\Rules\ValidMobile;
use Heydari81\User\Http\Rules\ValidPassword;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            "name" => 'required|min:3|max:80',
            "email" => 'required|email|min:3|max:190|unique:users,email,',
            "username" => 'nullable|min:3|max:190|unique:users,username,',
            "mobile" => ['required',new ValidMobile()],
            "password"=>['required','min:8','max:16',new ValidPassword()]
        ];
    }
}
