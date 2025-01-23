<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Añadir una actividad</title>
</head>
<body>
    <div>
        <h1>Enviando un tiempo</h1>

        <form action="/dashboard/time/store" method="POST">
            @csrf

            <div>
                <label>Hora de inicio</label>
                <div>
                    <div>
                        <select name="hour" id="hour">
                            <option value="" disabled selected>Hour</option>
                            @for ($hour = 0; $hour < 25; $hour++)
                                <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}</option>
                            @endfor
                        </select>
                        @error('hour')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <select name="minute" id="minute">
                            <option value="" disabled selected>Minutes</option>
                            @foreach (["00", "15", "30", "45"] as $minute)
                                <option value="{{ $minute }}">{{ $minute }}</option>
                            @endforeach
                        </select>
                        @error('minute')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
