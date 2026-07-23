<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestSectionFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'investment_id' => 'integer',
            'columns' => 'integer',
            'type' => 'integer',
            'lock' => 'boolean',
            'title' => 'nullable|string|min:2|max:190',
            'subtitle' => 'nullable|string|min:2|max:190',
            'content' => 'nullable|string|min:5',
            'file_alt' => ''
        ];
    }
}
