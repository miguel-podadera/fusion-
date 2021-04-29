<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class board extends Model
{
    public function list()
    {
        return $this->hasMany('app\list')->orderby('created_at', 'DESC');
    }
}
