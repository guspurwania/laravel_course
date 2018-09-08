<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name','desc'];

    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }
}
