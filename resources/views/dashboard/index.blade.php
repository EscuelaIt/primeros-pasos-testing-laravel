<!DOCTYPE html>
<html class="{{$theme}}" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h1>Este es el dashboard</h1>
    @if($timetables->isEmpty())
        <p>Puedes crear tu primer horario</p>
    @endif
    @foreach ($timetables as $timetable)
        <p>{{ $timetable->name }}</p>
    @endforeach
</body>
</html>
