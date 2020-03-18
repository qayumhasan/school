<?php

namespace App;


use App\Employee;
use Illuminate\Database\Eloquent\Model;

class ClassTeacher extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
