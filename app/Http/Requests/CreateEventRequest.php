<?php

namespace App\Http\Requests;

use App\Models\Event;
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
            'start_time' => [
                'required',
                'after_or_equal:now',
                function ($attribute, $value, $fail) {
                    $endTime = request()->input('end_time');
                    $venueId = request()->input('venue_id');
                    $conflictingEvents = Event::where(function ($query) use ($value, $endTime, $venueId) {
                        $query->where('venue_id', $venueId)
                            ->where('start_time', '<', $endTime)
                            ->where('end_time', '>', $value);
                    })->count();

                    if ($conflictingEvents > 0) {
                        $fail('The event time conflicts with existing events at the same venue.');
                    }
                },
            ],
            'end_time' => 'required|after_or_equal:start_date',
            'university_id' => 'required',
            'venue_id' => 'required',
            'description' => 'required',


        ];
    }
}
