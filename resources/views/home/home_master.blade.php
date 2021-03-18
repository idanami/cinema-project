<!DOCTYPE html>
<html>
@extends('layouts.master')
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @section('title','cinema home master')

</head>
<body>

@section('content')
    <section class="cinema">
        <div class="cinema-update">

            <div>
                <label for="cinema">Enter Cinema Name: </label>
                <input type="text" id="cinema"><br><br>
            </div>
            <div>
                <label for="movie">Enter Movie Name: </label>
                <input type="text" id="movie">
                <label for="movie_cinema">To: </label>
                <input type="text" placeholder="cinema name" id="movie_cinema"><br><br>
            </div>
            <div>
                <label for="time">Enter Time For Movie: </label>
                <input type="text" id="time">
                <label for="time_movie">To: </label>
                <input type="text" placeholder="movie name" id="time_movie">
                <label for="time_movie_cinema">And: </label>
                <input type="text" placeholder="cinema name" id="time_movie_cinema">
                <br><br>
            </div>


            {{ csrf_field() }}
        </div>
    </section>
@endsection

<script src="{{ mix('/js/app.js') }}"></script>
<script>

</script>
</body>
</html>

