<?php

namespace App;

use App\ClassSection;
use App\ClassSubject;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $guarded = [];
    //protected $table = 'classes';
    protected $hidden = ['created_at', 'updated_at'];

    public function classSections()
    {
        return $this->hasMany(ClassSection::class, 'class_id');
    }
    public function classSubjects()
    {
        return $this->hasMany(ClassSubject::class, 'class_id');
    }
}
