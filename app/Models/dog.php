<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    protected $table = 'dogs';

    protected $primaryKey = 'dog_id';

    protected $fillable = [
            'name',
            'breed',
            'age',
            'gender',
            'size',
            'temperament',
            'description',
            'image_path',
            'created_by',
            'status',
    ];
    
    public function applications() {
        return $this->hasOne(\App\Models\Application::class, 'dog_id', 'dog_id');
    }
    // public function application()
    // {
    //     return $this->hasMany(\App\Models\Application::class,  'dog_id', 'dog_id');
    // }
    public function admin(){
        return $this->belongsTo(\App\Models\Admin::class,'created_by','id');
    }

    // public function messages(): array
    // {
    //     return [
    //         'name.unique' => 'A dog with this name already exists in the system.',
    //         'name.required' => 'Dog name is required.',
    //         'name.max' => 'Dog name cannot exceed 50 characters.',
    //         'age.min' => 'Dog age cannot be negative.',
    //         'age.max' => 'Dog age cannot exceed 30 years.',
    //         'gender.in' => 'Gender must be either Male or Female.',
    //         'size.in' => 'Size must be Small, Medium, Large, or Extra Large.',
    //         'status.in' => 'Status must be either Available or Unavailable.',
    //     ];
    // }
}
