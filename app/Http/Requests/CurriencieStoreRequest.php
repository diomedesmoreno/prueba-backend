<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurriencieStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'symbol' => 'required|string|max:5',
            'exchange_rate' => 'required|integer|min:0',
        ];
    }
}
