<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUser extends FormRequest
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
            'name'=>['required','min:3','max:255'],
            'email'=>['email','required','max:255','unique:users'],
            'age'=>['numeric','required'],
            'gender'=>['required']
        ];

        if($this->method() === 'PUT' || $this->method() === 'PATCH' ){
            $id = $this->id ?? $this->user;
            $rules['email'] = [
                'required',
                'max:255',
                'email',
                // "unique:users,email,{$this->id},id"
                Rule::unique('users')->ignore($id),
            ];
        }

        return $rules;
    }
}
