<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnersRequest extends FormRequest
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
            'name'=>'Vardas yra privalomas; Turi būti ilgesnis nei 3 ir trumpesnis nei 32 simboliai',
            'surname'=>'Pavardė yra privaloma; Turi būti ilgesnis nei 3 ir trumpesnis nei 32 simboliai'
        ];
    }


    public function rules(): array
    {
        return [
                'name'=>'required|min:3|max:32',
                'surname'=>'required|min:3|max:32'
        ];
    }
}
