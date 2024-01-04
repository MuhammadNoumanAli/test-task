<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:active,inactive'],
            'address' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'min:8'],
            'about' => ['nullable', 'string'],
        ];
        if (request()->isMethod('POST')) { // when new record insert or add
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
            $rules['password'] = ['required', 'string', 'min:8'];
            $rules['avatar'] = ['required','image','mimes:jpeg,png,jpg,webp','max:2048'];
        }else{
            $rules['email'] = ['nullable', 'string', 'email', 'max:255'];
            $rules['password'] = ['nullable', 'string', 'min:8'];
            $rules['avatar'] = ['nullable','image','mimes:jpeg,png,jpg,webp','max:2048'];
        }
        return $rules;
    }
}
