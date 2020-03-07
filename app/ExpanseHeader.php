<?php

namespace App;

use App\Expanse;
use Illuminate\Database\Eloquent\Model;

class ExpanseHeader extends Model
{
    protected $guarded = [];

    public function expanses()
    {
        return $this->hasMany(Expanse::class, 'expanse_header_id');
    }
}
