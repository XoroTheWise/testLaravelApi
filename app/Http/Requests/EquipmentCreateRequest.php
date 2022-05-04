<?php

namespace App\Http\Requests;

use BenSampo\Enum\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Enums\TypeMaskEnum;
use Illuminate\Validation\Rule;

class EquipmentCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type_id' => ['required', 'integer', 'exists:types,id',],
            'number' => ['required', 'array'],
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Ошибка валидации',
            'data' => $validator->errors(),
        ]));
    }
}
