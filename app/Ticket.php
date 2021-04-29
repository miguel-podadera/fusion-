<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = "tickets";
    public function tasks()
    {
        return $this->hasMany('task');
    }
}
