<?php

namespace App\Http\Controllers;

use App\Quarterfinal;
use App\Semifinal;
use App\Team;
use Illuminate\Http\Request;

class SemifinalController extends Controller
{
    public function __invoke(){
        Semifinal::truncate();

        $randomWinner = array_rand([0, 1]);
        $randomLoser = array_rand([0, 1]);

        $winnersFromQuarterfinal = Quarterfinal::get();

        for ($i = 0; $i < count($winnersFromQuarterfinal) - 1; $i += 2) {
            $twoTeams = [$winnersFromQuarterfinal[$i]->winner_id, $winnersFromQuarterfinal[$i + 1]->winner_id];

            while ($randomLoser == $randomWinner) {
                $randomLoser = array_rand([0, 1]);
            };

            Semifinal::updateOrInsert([
                'first_team_id' => $twoTeams[0],
                'second_team_id' => $twoTeams[1],
                'winner_id' => $twoTeams[$randomWinner],
                'loser_id' => $twoTeams[$randomLoser]
            ]);
        }

        Team::addScores('semifinals');

        return redirect()->action('FinalController');
    }
}
