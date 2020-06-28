<?php

namespace App\Http\Controllers;

use App\Game;
use App\Quarterfinal;
use App\Team;
use Illuminate\Http\Request;

class QuarterfinalController extends Controller
{
    public function __invoke()
    {
        Quarterfinal::truncate();

        $randomWinner = array_rand([0, 1]);

        $bestTeamsOfDivisionA = Game::divisionA()->fourBestTeams()->get();
        $bestTeamsOfDivisionB = Game::divisionB()->fourBestTeams()->get()
            ->reverse()
            ->values();

        foreach ($bestTeamsOfDivisionA as $key => $teamA) {
            $twoTeams = [$teamA->winner_id, $bestTeamsOfDivisionB[$key]->winner_id];

            Quarterfinal::updateOrInsert([
                'first_team_id' => $twoTeams[0],
                'second_team_id' => $twoTeams[1],
                'winner_id' => $twoTeams[$randomWinner]
            ]);
        }

        Team::addScores('quarterfinals');

        return redirect()->action('SemifinalController');
    }

}
