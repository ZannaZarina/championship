<?php

namespace App\Http\Controllers;

use App\FinalGame;
use App\Game;
use App\Quarterfinal;
use App\Semifinal;
use App\Team;

class UpdateDatabaseController extends Controller
{
    public function playGamesBeforePlayoff()
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

    public function playoff()
    {
        Quarterfinal::truncate();
        Semifinal::truncate();
        FinalGame::truncate();

        $randomWinner = array_rand([0, 1]);
        $randomLoser = array_rand([0, 1]);

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

        Team::addScores('quarterfinals');
        Team::addScores('semifinals');
        Team::addScores('finals');

        return redirect()->route('playoff');
    }

}
