<?php

use App\Game;
use App\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run()
    {
        factory(Team::class, 8)->make()
            ->each(function (Team $team) {
                $team->division = 'A';
                $team->save();
            });

        factory(Team::class, 8)->make()
            ->each(function (Team $team) {
                $team->division = 'B';
                $team->save();
            });
    }
}
