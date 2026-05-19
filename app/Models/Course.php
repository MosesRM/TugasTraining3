<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Course extends Model
{
    //
    use HasUuids;

    protected $fillable = [
        'title',
        'description'
    ];

    // biar tidak auto increment karena kita pake uuid
    public $incrementing = false;
    protected $keyType = 'string';

    public function students(){
        return $this->belongsToMany(Student::class)
                    ->withPivot('id','status')
                    ->withTimestamps();
    }
}
