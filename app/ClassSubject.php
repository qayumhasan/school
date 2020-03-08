<?php

namespace App;

use App\Section;
use App\Subject;
use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{

    protected $guarded = [];
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
