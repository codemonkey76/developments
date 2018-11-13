<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public function development()
    {
        return $this->belongsTo(Development::class);
    }

    public function lots()
    {
        return $this->hasMany(Lot::class);
    }
}
