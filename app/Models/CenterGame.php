<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterGame extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}
