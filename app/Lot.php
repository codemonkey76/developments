<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $guarded = [];

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
    public function land_detail()
    {
        return $this->hasOne(LandDetail::class);
    }
    public function sale_contract()
    {
        return $this->hasOne(SaleContract::class);
    }
    public function building_plan()
    {
        return $this->hasOne(BuildingPlan::class);
    }
}
