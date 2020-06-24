<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!doctype html>
<html lang="en">
<head>
    <title>Competition</title>
</head>
<body>

<h1 class="text-center">Results before play-off</h1>
<br/> <br/>

<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th style="background-color: #bceea3">A</th>
        @foreach($teamsA as $team)
            <th>{{ $team->name }}</th>
        @endforeach
        <th>Scores</th>
    </tr>
    </thead>

    <tbody>
    @foreach($teamsA as $team)
        <tr>
            <th>{{ $team->name }}</th>

            @foreach($teamsA as $te)
                @if($team->id == $te->id)
                    <td style="background-color: #f5f5f5"></td>
                @else

                    @foreach($scores as $score)

                        @if($team->id == $score->first_team_id && $te->id == $score->second_team_id)
                            @if($team->id == $score->winner_id)
                                <td> 1:0</td>
                            @else
                                <td> 0:1</td>
                            @endif
                        @elseif($team->id == $score->second_team_id && $te->id == $score->first_team_id)
                            @if($team->id == $score->winner_id)
                                <td> 1:0</td>
                            @else
                                <td> 0:1</td>
                            @endif
                        @endif
                    @endforeach

                @endif
            @endforeach
            <td style="background-color: #dbeecb;"> {{ $team->score }} </td>
            @endforeach
        </tr>
    </tbody>
</table>

<br/>

<table class="table table-bordered text-center" style="border: 1px solid black">
    <thead>
    <tr>
        <th style="background-color: #c0ddfa">B</th>
        @foreach($teamsB as $team)
            <th>{{ $team->name }}</th>
        @endforeach
        <th>Scores</th>
    </tr>
    </thead>

    <tbody>
    @foreach($teamsB as $team)
        <tr>
            <th>{{ $team->name }}</th>

            @foreach($teamsB as $te)
                @if($team->id == $te->id)
                    <td style="background-color: #f5f5f5"></td>
                @else

                    @foreach($scores as $score)

                        @if($team->id == $score->first_team_id && $te->id == $score->second_team_id)
                            @if($team->id == $score->winner_id)
                                <td> 1:0</td>
                            @else
                                <td> 0:1</td>
                            @endif
                        @elseif($team->id == $score->second_team_id && $te->id == $score->first_team_id)
                            @if($team->id == $score->winner_id)
                                <td> 1:0</td>
                            @else
                                <td> 0:1</td>
                            @endif
                        @endif
                    @endforeach

                @endif
            @endforeach
            <td style="background-color: #e4ebfb"> {{ $team->score }} </td>
            @endforeach
        </tr>
    </tbody>
</table>
<br>
<h4 style="text-align: center"> Best teams of each division who go to play-off: </h4>
<div style="display:flex; justify-content: center; text-align: center">
    <div>
        <h5>Division A:</h5>
        <ul>
            @for ($i = 0; $i<4; $i++)
                <li>{{ $teamsA[$i]->name }} - {{$teamsA[$i]->score}}</li>
            @endfor
        </ul>
    </div>
    <div>
        <h5>Division B:</h5>
        <ul>
            @for ($i = 0; $i<4; $i++)
                <li>{{ $teamsB[$i]->name }} - {{$teamsB[$i]->score}}</li>
            @endfor
        </ul>
    </div>
</div>

<div style="text-align:center">
    <a href="{{ route('play') }}"
       role="button"
       class="btn-md active card-link btn btn-info"
       style="align-items: center">
        Go to Play-off!
    </a>
</div>
<br>

</body>
</html>


