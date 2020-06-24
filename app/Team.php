<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function scopeDivisionA($query)
    {
        $query->where('division', 'A');
    }

    public function scopeDivisionB($query)
    {
        $query->where('division', 'B');
    }

    public function scopeAddScores($query, string $table)
    {
        $query->join($table, 'teams.id', '=', $table . '.winner_id')
        ->increment('score');
    }

    public function scopeOrderDesc($query)
    {
        $query->orderBy('score', 'desc');
    }
}
