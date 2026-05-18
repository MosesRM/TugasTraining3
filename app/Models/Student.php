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
    
    public function course(){
        return $this->belongsToMany(Course::class)
        ->withPivot('status')
        ->withTimestamps();
    }
}
