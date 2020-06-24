<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semifinal extends Model
{
    public function scopeJoinTablesAndSelectTeams($query)
    {
        $query->join('teams', 'semifinals.first_team_id', '=', 'teams.id')
            ->join('teams as opponents', 'semifinals.second_team_id', '=', 'opponents.id')
            ->select('teams.name as firstTeamName',
                'teams.division as firstTeamDivision',
                'teams.id as firstTeamId',
                'opponents.name as secondTeamName',
                'opponents.division as secondTeamDivision',
                'opponents.id as secondTeamId',
                'winner_id');
    }

}
