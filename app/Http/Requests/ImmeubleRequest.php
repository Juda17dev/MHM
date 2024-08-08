<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImmeubleRequest extends FormRequest
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
            'libelle' => ['required','unique:immeubles,libelle','max:127'],
            'adresse' => ['required','unique:immeubles,adresse','max:127']
        ];
    }

    public function attributes() : array {
        return [
            'libelle' => 'le nom de l\'immeuble',
            'adresse' => "Cette adresse"
        ];
    }

    
}
