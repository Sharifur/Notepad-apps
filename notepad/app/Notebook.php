<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $table='notebooks';
    protected $fillable=[
       'name','user_id','title','description','picture',
       ];
}
