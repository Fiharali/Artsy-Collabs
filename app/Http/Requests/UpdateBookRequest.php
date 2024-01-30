<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected  $stopOnFirstFailure = true;
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
        $totalCopies = $this->input('total_copies');
        return [
            //
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required|max:255',
            'description' => 'required',
            'total_copies' => 'required|integer|min:0',
            'available_copies' => [
                'required',
                'integer',
                'min:0',
                'max:' . ($totalCopies ?: 0),
            ],
            'publication_year' => 'required|date',
        ];
    }
}
