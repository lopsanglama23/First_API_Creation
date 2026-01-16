<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    protected $table = 'dogs';
    public $incrementing = true;
    protected $keyType = 'int';
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
        return $this->hasMany(\App\Models\Application::class, 'dog_id', 'dog_id');
    }
    // public function application()
    // {
    //     return $this->hasMany(\App\Models\Application::class,  'dog_id', 'dog_id');
    // }
    public function admin(){
        return $this->belongsTo(\App\Models\Admin::class,'created_by','id');
    }

}
