<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Course extends Model
{
    //
    protected $fillable = [
        'title',
        'description'
    ];

    // biar tidak auto increment karena kita pake uuid
    public $incrementing = false;
    protected $keyType = 'string';

    public function students(){
        return $this->belongsToMany(Student::class)
                    ->withPivot('status')
                    ->withTimestamps();
    }
}
