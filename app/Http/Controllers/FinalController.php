<?php

namespace App\Http\Controllers;

use App\FinalGame;
use App\Semifinal;
use App\Team;
use Illuminate\Http\Request;

class FinalController extends Controller
{
    public function __invoke()
    {
        FinalGame::truncate();

        $randomWinner = array_rand([0, 1]);
        $randomLoser = array_rand([0, 1]);

        while ($randomWinner == $randomLoser) {
            $randomLoser = array_rand([0, 1]);
        };

        $winnersFromSemifinal = Semifinal::pluck('winner_id');
        $losersFromSemifinal = Semifinal::pluck('loser_id');

        $finalTeams = [$winnersFromSemifinal, $losersFromSemifinal];

        foreach ($finalTeams as $team) {
            FinalGame::updateOrInsert([
                'first_team_id' => $team[0],
                'second_team_id' => $team[1],
                'winner_id' => $team[$randomWinner],
                'loser_id' => $team[$randomLoser],
            ]);
        }

        Team::addScores('finals');

        return redirect()->route('playoff');
    }

}
