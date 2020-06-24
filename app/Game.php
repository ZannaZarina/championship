<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
    public function scopeCountScores($query)
    {
        $query->select('winner_id', DB::raw('count(winner_id) as count'))
            ->groupBy('winner_id');
    }

    public function scopeFourBestTeams($query)
    {
        $query->select('winner_id', DB::raw('count(winner_id) as count'))
            ->groupBy('winner_id')
            ->orderBy('count', 'desc')
            ->orderBy('winner_id', 'asc')
            ->limit(4);
    }

    public function scopeDivisionA($query)
    {
        $query->where('division', 'A');
    }

    public function scopeDivisionB($query)
    {
        $query->where('division', 'B');
    }



}
