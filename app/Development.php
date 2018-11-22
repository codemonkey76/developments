<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Development extends Model
{
    protected $guarded = [];

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }
}
