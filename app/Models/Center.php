<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function centerImages()
    {
        return $this->hasMany(CenterImage::class, 'center_id', 'id');
    }

    public function games()
    {
        return $this->hasMany(CenterGame::class,'center_id');
    }

    public function vipRoom()
    {
        return $this->hasOne(VipRoom::class, 'center_id', 'id');
    }

    public function ordinaryRoom()
    {
        return $this->hasOne(OrdinaryRoom::class, 'center_id', 'id');
    }
}
