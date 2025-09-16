<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:50',
            'breed'       => 'required|string|max:50',
            'age'         => 'required|integer|min:0',
            'gender'      => 'required|in:Male,Female',
            'size'        => 'required|in:Small,Medium,Large,Extra Large',
            'temperament' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path'  => 'nullable|string|max:255',
            'created_by'  => 'nullable|integer|exists:users,id',
            'status'      => 'required|in:Available,Unavailable',
       
        ];
    }
}
