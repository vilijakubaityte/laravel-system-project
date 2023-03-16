<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

    public function messages(): array
    {
        return [
            'reg_number'=>'Valstybinis numeris yra įvestas neteisingai, turi būti 3 didžiosios raidės ir 3 skaitmenys',
            'brand'=>'Mašinos markė yra privaloma',
            'model'=>'Mašinos modelis yra privalomas'
        ];
    }

    public function rules(): array
    {
        return [
            'reg_number'=>'required|regex:/^[A-Z]{3}[0-9]{3}$/',
            'brand'=>'required|min:2|max:20',
            'model'=>'required|min:2|max:20'
        ];
    }
}
