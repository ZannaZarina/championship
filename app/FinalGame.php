<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalGame extends Model
{
    protected $table = 'finals';

    public function scopeJoinTablesAndSelectTeams($query)
    {
        $query->join('teams', 'finals.first_team_id', '=', 'teams.id')
            ->join('teams as opponents', 'finals.second_team_id', '=', 'opponents.id')
            ->join('teams as winners', 'finals.winner_id', '=', 'winners.id')
            ->join('teams as losers', 'finals.loser_id', '=', 'losers.id')
            ->select('teams.id as firstTeamId',
                'teams.division as firstTeamDivision',
                'teams.name as firstTeamName',
                'opponents.id as secondTeamId',
                'opponents.division as secondTeamDivision',
                'opponents.name as secondTeamName',
                'winner_id', 'loser_id',
                'winners.score as winScore', 'losers.score as lossScore');
    }

}
