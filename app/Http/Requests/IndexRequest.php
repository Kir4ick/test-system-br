<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'hotel_id' => 'required|integer|exists:hotels,id',
        ];
    }

    protected function prepareForValidation(): void
    {
        if (!$this->has('hotel_id')) {
            $this->merge(['hotel_id' => 1]);
        }
    }

}
