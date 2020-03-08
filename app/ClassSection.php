<?php

namespace App;

use App\Section;
use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    protected $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
