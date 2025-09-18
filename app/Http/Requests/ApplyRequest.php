<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyRequest extends FormRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'dog_id' => 'required|integer|exists:dogs,dog_id',
            'application_date' => 'required|date',
            'status' => 'nullable|in:Pending,Approved,Rejected',
            'notes' => 'nullable|string',
            'full_name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'housing_type' => 'required|in:House,Apartment,Condo',
            'has_yard' => 'required|in:Yes,No',
            'has_children' => 'required|in:Yes,No',
            'has_other_pets' => 'required|in:Yes,No',
            'work_schedule' => 'required|string',
            'previous_experience' => 'required|string',
            'adoption_reason' => 'required|string'
        ];
    }
}
