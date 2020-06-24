<?php

namespace App\Http\Controllers;

use App\FinalGame;
use App\Game;
use App\Quarterfinal;
use App\Semifinal;
use App\Team;

class CompetitionController extends Controller
{
    public function createDivisionTables()
    {
        $scores = Game::get();
        $teamsA = Team::divisionA()->orderDesc()->get();
        $teamsB = Team::divisionB()->orderDesc()->get();

        return view('tables', [
            'scores' => $scores,
            'teamsA' => $teamsA,
            'teamsB' => $teamsB
        ]);
    }

    public function runPlayoff()
    {
        $quarterfinals = Quarterfinal::joinTablesAndSelectTeams()->get();
        $semifinals = Semifinal::joinTablesAndSelectTeams()->get();
        $finals = FinalGame::joinTablesAndSelectTeams()->get();
        $teams = Team::orderDesc()->get();

        return view('play-off', [
            'quarterfinals' => $quarterfinals,
            'semifinals' => $semifinals,
            'finals' => $finals,
            'teams' => $teams
        ]);
    }

}
