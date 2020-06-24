<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!doctype html>
<html lang="en">
<head>
    <title>Play-off</title>
</head>
<body>

<h1 class="text-center">Play-off results</h1>
<br/> <br/>

<div style="display: flex; justify-content: space-around">

    <div style="width: 20%">
        <b> QUARTERFINAL:</b> <br> <br>
        @foreach($quarterfinals as $score)

            <table>

                <tr>
                    <td>
                        <div class="input-group">
                            <div class="form-control">{{ $score->firstTeamName }}({{ $score->firstTeamDivision }})
                            </div>
                        </div>
                    </td>

                    <td class="col-2" rowspan="2" style="padding:0px; position:relative; min-width:50px;">
                        <div
                            style="border-top: 3px solid #00c200; border-right: 3px solid #00c200; width:80%; height:25%; float: left; position:absolute; top:25%;"></div>
                        <div
                            style="border-bottom: 3px solid #0049c0; border-right: 3px solid #0049c0; width:80%; height:25%; float: left; position:absolute; top:50%;"></div>

                        @if($score->winner_id ==  $score->firstTeamId)
                            <div
                                style="border-top: 3px solid #00c200; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
                        @else
                            <div
                                style="border-top: 3px solid #0049c0; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
                        @endif
                    </td>

                    <td rowspan="2">

                        <div class="input-group">
                            <div class="form-control">
                                @if($score->winner_id ==  $score->firstTeamId)
                                    {{ $score->firstTeamName }}({{ $score->firstTeamDivision }})
                                @else
                                    {{ $score->secondTeamName }}({{ $score->secondTeamDivision }})
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="input-group">
                            <div class="form-control">{{ $score->secondTeamName }}({{ $score->secondTeamDivision }})
                            </div>
                        </div>
                    </td>
                </tr>

            </table>

            <br/>
        @endforeach
    </div>

    <br>

    <div  style="width: 20%">
        <b> SEMIFINAL:</b> <br> <br>
        @foreach($semifinals as $score)

            <table>
                <tr>
                    <td>
                        <div class="input-group">
                            <div class="form-control">{{ $score->firstTeamName }}({{ $score->firstTeamDivision }})
                            </div>
                        </div>
                    </td>

                    <td class="col-2" rowspan="2" style="padding:0px; position:relative; min-width:50px;">
                        <div
                            style="border-top: 3px solid #00c200; border-right: 3px solid #00c200; width:80%; height:25%; float: left; position:absolute; top:25%;"></div>
                        <div
                            style="border-bottom: 3px solid #0049c0; border-right: 3px solid #0049c0; width:80%; height:25%; float: left; position:absolute; top:50%;"></div>
                        @if($score->winner_id ==  $score->firstTeamId)
                            <div
                                style="border-top: 3px solid #00c200; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
                        @else
                            <div
                                style="border-top: 3px solid #0049c0; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
                        @endif
                    </td>

                    <td rowspan="2">

                        <div class="input-group">
                            <div class="form-control">
                                @if($score->winner_id ==  $score->firstTeamId)
                                    {{ $score->firstTeamName }}({{ $score->firstTeamDivision }})
                                @else
                                    {{ $score->secondTeamName }}({{ $score->secondTeamDivision }})
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="input-group">
                            <div class="form-control">{{ $score->secondTeamName }}({{ $score->secondTeamDivision }})
                            </div>
                        </div>
                    </td>
                </tr>

            </table>

            <br>

        @endforeach
    </div>

    <br>

    <div  style="width: 20%">
        <b> FINAL:</b> <br> <br>
        @foreach($finals as $score)

            <table>
                <tr>
                    <td>
                        <div class="input-group">
                            <div class="form-control">{{ $score->firstTeamName }}({{ $score->firstTeamDivision }})
                            </div>
                        </div>
                    </td>

                    <td class="col-2" rowspan="2" style="padding:0px; position:relative; min-width:50px;">
                        <div
                            style="border-top: 3px solid #00c200; border-right: 3px solid #00c200; width:80%; height:25%; float: left; position:absolute; top:25%;"></div>
                        <div
                            style="border-bottom: 3px solid #0049c0; border-right: 3px solid #0049c0; width:80%; height:25%; float: left; position:absolute; top:50%;"></div>
                        @if($score->winner_id ==  $score->firstTeamId)
                            <div
                                style="border-top: 3px solid #00c200; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
                        @else
                            <div
                                style="border-top: 3px solid #0049c0; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
                        @endif
                    </td>

                    <td rowspan="2">

                        <div class="input-group">
                            <div class="form-control">
                                @if($score->winner_id ==  $score->firstTeamId)
                                    {{ $score->firstTeamName }}({{ $score->firstTeamDivision }})
                                @else
                                    {{ $score->secondTeamName }}({{ $score->secondTeamDivision }})
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="input-group">
                            <div class="form-control">{{ $score->secondTeamName }}({{ $score->secondTeamDivision }})
                            </div>
                        </div>
                    </td>
                </tr>

            </table>

            <br/>

            <br>
        @endforeach
        <b> Places according to final competition:</b> <br> <br>
        <table class="table table-striped">
            <tr>
                <th>Place</th>
                <th>Team</th>
            </tr>
            <tr>
                <td>1</td>
                @if($finals[0]->winner_id ==  $finals[0]->firstTeamId)
                    <td>{{$finals[0]->firstTeamName }}</td>
                @else
                    <td>{{$finals[0]->secondTeamName }}</td>
                @endif
            </tr>
            <tr>
                <td>2</td>
                @if($finals[0]->loser_id ==  $finals[0]->firstTeamId)
                    <td>{{$finals[0]->firstTeamName }}</td>
                @else
                    <td>{{$finals[0]->secondTeamName }}</td>
                @endif
            </tr>
            <tr>
                <td>3</td>
                @if($finals[1]->winner_id ==  $finals[1]->firstTeamId)
                    <td>{{$finals[1]->firstTeamName }}</td>
                @else
                    <td>{{$finals[1]->secondTeamName }}</td>
                @endif
            </tr>
        </table>
    </div>

    <div style="width: 20%">
        <b> List of teams according to earned points </b> <br> <br>
        <table class="table table-striped">
            <tr>
                <th>Team</th>
                <th>Division</th>
                <th>Points</th>
            </tr>
            @foreach($teams as $key=>$team)
                <tr>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->division }}</td>
                    <td>{{ $team->score }}</td>
                </tr>
            @endforeach
        </table>
    </div>


</div>

<div style="text-align:center">
    <a href="{{ route('update') }}"
       role="button"
       class="btn-md active card-link btn btn-info"
       style="align-items: center">
        Restart games within those divisions
    </a>
</div>
<br>



</body>
</html>

