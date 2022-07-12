<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    public function process(){
        return  $this->hasOne(process::class,'id','name');
      }
}
