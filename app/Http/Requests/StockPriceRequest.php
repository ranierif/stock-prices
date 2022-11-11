<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockPriceRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'symbol' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'symbol.required' => __('Informe o Stock que deseja consultar.'),
            'symbol.string' => __('O nome Stock deve ser uma string.'),
            'symbol.max' => __('O nome Stock deve ter no máximo 255 caracteres.'),
        ];
    }
}
