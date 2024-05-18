<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'title' => 'max:155|min:2',
            'image' => 'image|nullable',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'university_id' => 'nullable',
            'venue_id' => 'nullable',
            'description' => 'nullable',
        ];
    }
}
