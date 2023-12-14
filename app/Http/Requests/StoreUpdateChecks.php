<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateChecks extends FormRequest
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
            'car_id'=>['required'],
            'exterior'=>['nullable','max:255'],
            'interior'=>['nullable','max:255'],
            'mechanical'=>['nullable','max:255'],
            'electrical'=>['nullable','max:255'],
            'oil'=>['nullable'],
            'tires'=>['nullable'],
            'scheduled'=>['required']
        ];
        return $rules;
    }
}
