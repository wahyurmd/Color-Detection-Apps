<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Color Detection</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>
<body class="teal lighten-5">
    <!-- top nav -->
    <nav class="z-depth-0">
        <div class="nav-wrapper container">
        <a href="/">Color <span>Detection</span></a>
        </div>
    </nav>

    <div class="col s12 m6">
        <div class="card">
            @foreach ($data as $row)
                <div class="card-content">
                    <span class="card-title">
                        @php
                            $redFreq = $row->r;
                            $greenFreq = $row->g;
                            $blueFreq = $row->b;
                        @endphp
                        
                        @if ($redFreq < $greenFreq && $redFreq < $blueFreq && $redFreq <= 255)
                            @if ($redFreq > 30 && $redFreq < 50)
                                @if ($greenFreq > 60 && $greenFreq < 100)
                                    @if ($blueFreq > 65 && $blueFreq < 80)
                                        {{ "Color: BROWN" }}
                                    @elseif ($blueFreq > 55 && $blueFreq < 85)
                                        {{ "Color: RED" }}
                                    @endif
                                @endif
                            @elseif ($redFreq > 20 && $redFreq < 50)
                                @if ($greenFreq > 30 && $greenFreq < 50)
                                    @if ($blueFreq > 50 && $blueFreq < 70)
                                        {{ "Color: YELLOW" }}
                                    @endif
                                @elseif ($greenFreq > 45 && $greenFreq < 80)
                                    @if ($blueFreq > 60 && $blueFreq < 100)
                                        {{ "Color: ORANGE" }}
                                    @endif
                                @endif
                            @elseif ($redFreq > 35 && $redFreq < 75)
                                @if ($greenFreq > 45 && $greenFreq < 80)
                                    @if ($blueFreq > 35 && $blueFreq < 60)
                                        {{ "Color: GREY" }}
                                    @endif
                                @endif
                            @endif
                        @elseif ($greenFreq < $redFreq && $greenFreq < $blueFreq && $greenFreq <= 255)
                            @if ($greenFreq < 60 && $redFreq > 55 && $blueFreq > 60)
                                {{ "Color: GREEN" }}
                            @endif
                        @elseif ($blueFreq < $redFreq && $blueFreq < $greenFreq && $blueFreq <= 255)
                            @if ($blueFreq > 30 && $blueFreq < 60)
                                @if ($redFreq > 65 && $redFreq < 150)
                                    @if ($greenFreq > 60 && $greenFreq < 110)
                                        {{ "Color: BLUE" }}
                                    @endif
                                @elseif ($redFreq > 35 && $redFreq < 90)
                                    @if ($greenFreq > 50 && $greenFreq < 95)
                                        {{ "Color: PURPLE" }}
                                    @elseif ($greenFreq > 40 && $greenFreq < 95)
                                        {{ "Color: GREY" }}
                                    @endif
                                @endif
                            @elseif ($blueFreq > 110 && $blueFreq < 175)
                                @if ($redFreq > 115 && $redFreq < 190)
                                    @if ($greenFreq > 125 && $greenFreq < 225)
                                        {{ "Color: BLACK" }}
                                    @endif
                                @endif
                            @endif
                        @elseif ($redFreq > 255 && $greenFreq > 255 && $blueFreq > 255)
                            {{ "No Color Detected" }}
                        @endif
                    </span>
                    <p><u>Frequency RGB</u></p>
                    <p>R : {{ $row->r }}, G : {{ $row->g }}, B : {{ $row->b }}</p>
                </div>
                <div class="card-action">
                    <a href="#"></a>
                    <a class="right" href="#">Date: {{ $row->created_at }}</a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
    <script>
        setTimeout("location.reload(true);", 1000);
    </script>
</body>
</html>