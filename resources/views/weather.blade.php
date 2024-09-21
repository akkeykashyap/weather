<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        margin-bottom: 60px;
        /* Height of the footer */
    }

    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 60px;
        /* Height of the footer */
        background-color: #f5f5f5;
    }

    p.card-text {
        margin-top: -10px;
    }
    </style>
</head>

<body>

    {{-- {{print_r($data)}} --}}

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Weather App</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5 mb-4">Weather Application</h1>
        <div class="input-group mb-3">
            <form action="{{route('weather-form')}}" method="post" class="form-inline">
                @csrf
                <div class="d-flex">
                    <div class="form-group">
                        <select class="form-select" name="city" id="city">
                            <option value="-1">-- Select City --</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Noida">Noida</option>
                        </select>
                    </div>
                    <button style="margin-left: 20px;" class="btn btn-primary">Search</button>
                </div>
            </form>

        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Looks Like</h5>
                        <br>
                        @if (isset($data['weather']['main']) && $data['weather']['main'] == 'Clear')
                            <img src="./image/clear.png" alt="clear weather">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Location Details</h5>
                        <br>
                        <p class="card-text">Country:
                            <b> @if (isset($data['sys']['country']))
                                {{$data['sys']['country']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Name:
                            <b> @if (isset($data['name']))
                                    {{$data['name']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Latitude:
                            <b> @if (isset($data['coord']['lat']))
                                    {{$data['coord']['lat']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Longitude:
                            <b> @if (isset($data['coord']['lon']))
                                {{$data['coord']['lon']}}
                            @else
                              --
                            @endif
                        </b>
                        </p>
                        <p class="card-text">Sunrise:
                            <b> @if (isset($data['sys']['sunrise']))
                                {{$data['sys']['sunrise']}}
                                @else
                                  --
                            @endif
                            </b>
                        </p>
                        <p class="card-text">Sunset:
                            <b> @if (isset($data['sys']['sunset']))
                                {{$data['sys']['sunset']}}
                                @else
                                  --
                            @endif
                            </b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Temperature &deg; F</h5>
                        <br>
                        <p class="card-text">Temp:
                            <b> @if (isset($data['main']['temp']))
                                {{$data['main']['temp']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Min Temp:
                            <b> @if (isset($data['main']['temp_min']))
                                {{$data['main']['temp_min']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Max Temp:
                            <b> @if (isset($data['main']['temp_max']))
                                {{$data['main']['temp_max']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Feels Like:
                            <b> @if (isset($data['main']['feels_like']))
                                {{$data['main']['feels_like']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Precipitation &percnt;</h5>
                        <br>
                        <p class="card-text">Humidity:
                            <b> @if (isset($data['main']['humidity']))
                                {{$data['main']['humidity']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Pressure:
                            <b> @if (isset($data['main']['pressure']))
                                {{$data['main']['pressure']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Sea Level:
                            <b> @if (isset($data['main']['sea_level']))
                                {{$data['main']['sea_level']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Ground Level:
                            <b> @if (isset($data['main']['grnd_level']))
                                {{$data['main']['grnd_level']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Visibility:
                            <b> @if (isset($data['visibility']))
                                {{$data['visibility']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Wind m/h</h5>
                        <br>
                        <p class="card-text">Speed:
                            <b> @if (isset($data['wind']['speed']))
                                {{$data['wind']['speed']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Degree:
                            <b> @if (isset($data['wind']['deg']))
                                {{$data['wind']['deg']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                        <p class="card-text">Gust:
                            <b> @if (isset($data['wind']['deg']))
                                {{$data['wind']['deg']}}
                                @else
                                  --
                                @endif
                            </b>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br><br>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">© 2024 Weather App. All rights reserved.</span>
        </div>
    </footer>
</body>

</html>
