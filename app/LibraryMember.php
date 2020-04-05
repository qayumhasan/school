<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibraryMember extends Model
{
   protected $guarded =[];

   public function setMemberIdAttribute($value)
   {
   	$this->attributes['member_id'] = rand(10000,99999);
   }
}
