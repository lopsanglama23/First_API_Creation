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
    public function application()
    {
        return $this->hasMany(\App\Models\Application::class,  'dog_id', 'dog_id');
    }
}
