<?php

namespace App\Http\Controllers;

use App\Game;
use App\Team;
use Illuminate\Http\Request;

class GameBeforePlayoffController extends Controller
{
    public function __invoke()
    {
        Game::truncate();

        $divisionATeams = Team::DivisionA()->get();
        $divisionBTeams = Team::DivisionB()->get();

        $teams = ['A' => $divisionATeams, 'B' => $divisionBTeams];

        foreach ($teams as $key => $team) {
            for ($i = 0; $i < count($team) - 1; $i++) {
                for ($j = $i + 1; $j < count($team); $j++) {

                    $twoTeams = [$team[$i]->id, $team[$j]->id];

                    Game::updateOrInsert([
                        'first_team_id' => $team[$i]->id,
                        'second_team_id' => $team[$j]->id,
                        'division' => $key,
                        'winner_id' => $twoTeams[array_rand([0, 1])]
                    ]);
                }
            }
        }

        $countScoresBeforePlayoff = Game::countScores()->get();

        foreach ($countScoresBeforePlayoff as $score) {
            Team::where('id', $score->winner_id)
                ->update(['score' => $score->count]);
        }

        return redirect()->route('tables');
    }
}
