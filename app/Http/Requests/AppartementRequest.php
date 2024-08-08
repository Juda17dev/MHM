<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppartementRequest extends FormRequest
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
            'libelle' => ['required','unique:appartements,libelle','max:127'],
        ];
    }

    public function attributes() : array {
        return [
            'libelle' => "Le nom de l'appartement"
        ];
    }
}
