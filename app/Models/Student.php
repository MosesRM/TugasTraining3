<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Student extends Model
{
    //
    protected $fillable = [
        'name',
        'email'
    ];
    
    // biar tidak auto increment karena kita pake uuid
    public $incrementing = false;
    protected $keyType = 'string';

    public function course(){
        return $this->belongsToMany(Course::class)
        ->withPivot('status')
        ->withTimestamps();
    }
}
