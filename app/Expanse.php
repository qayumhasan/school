<?php

namespace App;

use App\ExpanseHeader;
use Illuminate\Database\Eloquent\Model;

class Expanse extends Model
{
    protected $guarded = [];
    public function ExpanseHeader()
    {
        return $this->belongsTo(ExpanseHeader::class);
    }
}
