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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'name'        => 'required|string|max:50|unique:dogs,nnnname',
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
        if ($this->isMethod('put')) {
            return [
                'name'        => 'required|string|unique|max:50',
                'breed'       => 'required|string|max:50',
                'age'         => 'required|integer|min:0',
                'gender'      => 'required|in:Male,Female',
                'size'        => 'required|in:Small,Medium,Large,Extra Large',
                'temperament' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'image_path'  => 'nullable|string|max:255',
                'created_by'  => 'nullable|integer|exists:users,id',
                'status'      => 'required|in:Available,Unavailable'
            ];
        }
    
        return [];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Dog name is required.',
            'name.unique' => 'A dog with this name already exists in the system.',
            'name.max' => 'Dog name cannot exceed 50 characters.',
            'breed.required' => 'Dog breed is required.',
            'age.required' => 'Dog age is required.',
            'age.integer' => 'Dog age must be a number.',
            'age.min' => 'Dog age cannot be negative.',
            'age.max' => 'Dog age cannot exceed 30 years.',
            'gender.required' => 'Dog gender is required.',
            'gender.in' => 'Gender must be either Male or Female.',
            'size.required' => 'Dog size is required.',
            'size.in' => 'Size must be Small, Medium, Large, or Extra Large.',
            'status.required' => 'Dog status is required.',
            'status.in' => 'Status must be either Available or Unavailable.',
            'created_by.exists' => 'The selected user does not exist.',
        ];
    }
 }

    

