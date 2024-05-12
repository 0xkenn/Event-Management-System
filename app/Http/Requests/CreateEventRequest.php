<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
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
            'title' => 'required|max:155|min:2',
            'image' => 'image|required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|after_or_equal:start_date',
            'start_time' => 'required',
            'university_id' => 'required',
            'venue_id' => 'required',
            'description' => 'required',
        ];
    }
}
