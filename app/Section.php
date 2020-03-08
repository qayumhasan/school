<?php

namespace App;

use App\ClassSection;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = [];

    public function classSections()
    {
        return $this->hasMany(ClassSection::class);
    }
}
