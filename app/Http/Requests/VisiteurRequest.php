<?php

namespace App\Http\Requests;

use App\Enums\TypeStatutEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VisiteurRequest extends FormRequest
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
            'nom' => ['required','max:127'],
            'prenom' => ['required','max:127'],
            'identite' => ['required','max:127']
        ];
    }

    public function attributes() : array {
        return [
            'nom' => "Le nom du visiteur",
            'prenom' => "Le prenom du visiteur",
            'identite' => "L'identité du visiteur"
        ];
    }
}
