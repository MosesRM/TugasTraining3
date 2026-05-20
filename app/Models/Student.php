<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    use HasUuids;
    
    protected $fillable = [
        'name',
        'email'
    ];
    
    // biar tidak auto increment karena kita pake uuid
    public $incrementing = false;
    protected $keyType = 'string';

    public function course(){
        return $this->belongsToMany(Course::class)
        ->withPivot('id', 'status')
        ->withTimestamps()
        ->orderByPivot( 'id');
    }
}
