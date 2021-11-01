<!DOCTYPE html>
<html>
@extends('layouts.master')
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    @section('title','cinema home master')

</head>
<body>

@section('content')
    <section class="cinema_homemaster">
        <div class="update_list">

            <div class="cinema-update">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                @endif
                @if(session()->get('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
                @endif
                @if(session()->get('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('fail') }}
                </div>
                @endif
                <h1 class="update_title">Update Table</h1>
                <form action="add-cinema" method="POST" enctype="multipart/form-data" class="form-update__all">
                    @csrf
                    <h4 class="subtitle">Cinema:</h4>
                    <div class="cinema-update__list">
                        <div class="data__update">
                                <label for="cinema_name">Name: </label>
                                <input type="text" name="cinema_name" id="cinema_name" required>
                                <label for="address">Address:</label>
                                <input type="text" name="address" id="address" required>
                        </div>
                        <div class="data__update__submit">
                            <input type="submit" value="add cinema">
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>

                <form action="add-movie" method="POST" enctype="multipart/form-data" class="form-update__all">
                    @csrf
                    <h4 class="subtitle">Movie:</h4>
                    <div class="cinema-update__list">
                        <div class="data__update">
                                <label for="movie_name">Name: </label>
                                <input type="text" name="movie_name" id="movie_name" required>
                                <label for="genres">Genres: </label>
                                <input type="text" name="genres" id="genres" required>
                                <label for="runtime">Runtime: </label>
                                <input type="number" name="runtime" id="runtime" required>
                        </div>
                        <div class="data__update__submit">
                            <input type="submit" value="add movie">
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>

                <form action="add-radiations" method="POST" enctype="multipart/form-data" class="form-update__all">
                    @csrf
                    <h4 class="subtitle">screenings:</h4>
                    <div>
                        <select name="Mcinema" id="Mcinema" class="selected-list select_cinema">
                            <option value="">Select Cinema</option>
                                @foreach($cinema as $cinema)cinema_name
                                    <option value="{{ $cinema->id }}">{{ $cinema->cinema_name }} - {{$cinema->address}} </option>
                                @endforeach
                        </select>
                    </div>
                    <div>
                        <select name="Mmovie" id="Mmovie" class="selected-list select_movie">
                            <option value="">Select Movie</option>
                                @foreach($movie as $movie)
                                    <option value="{{ $movie->id }}">{{ $movie->movie_name }} </option>
                                @endforeach
                        </select>
                    </div>
                    <div class="cinema-update__list">
                        <div class="data__update">
                                <label for="screening_time">Screening Time: </label>
                                <input type="time" name="screening_time" id="screening_time" required>
                                <label for="seats">Seats: </label>
                                <input type="number" name="seats" id="seats" required>

                                <input type="hidden" name="Hcinema_id" id="cinemaid">
                                <input type="hidden" name="Hmovie_id" id="movieid">
                        </div>
                        <div class="data__update__submit">
                            <input type="submit" value="add radiations">
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </section>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>>

<script type="text/javascript">
    $(document).ready(function(){
        var hiddenCinema = document.getElementById('cinemaid')
        var hiddenMovie = document.getElementById('movieid')
        $('.select_cinema').change(function(){
            var cinema_id=$(this).val();
            hiddenCinema.setAttribute('value',cinema_id);
        });
        $('.select_movie').change(function(){
            var movie_id=$(this).val();
            hiddenMovie.setAttribute('value',movie_id);
        });

    });
</script>
</body>
</html>

