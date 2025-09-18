<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $primaryKey = 'application_id';
    
    protected $fillable = [
        'user_id',
        'dog_id',
        'application_date',
        'status',
        'notes',
        'full_name',
        'email',
        'phone',
        'address',
        'housing_type',
        'has_yard',
        'has_children',
        'has_other_pets',
        'work_schedule',
        'previous_experience',
        'adoption_reason'
    ];
   public function dog() {
        return $this->belongsTo(\App\Models\Dog::class, 'dog_id');
    }
    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
