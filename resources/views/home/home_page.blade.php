<!DOCTYPE html>
<html> 
@extends('layouts.master')
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @section('title','cinema home')
</head>
<body>
<!-- <div class="background"></div> -->

@section('content')

<section class="cinema">
    <div class="container">
        <div class="all-list">
            <select name="cinema" id="cinema" class="cinema-list">
                <option value="">Select Cinema</option>
                    @foreach($cinema_list as $cinema)
                        <option value="{{ $cinema->cinema_name}}">{{ $cinema->cinema_name }}</option>
                    @endforeach
            </select>
        </div>    
        <div class="all-list">
            <select name="movie" id="movie" class="cinema-list">
                <option value="">Select Movie</option>
            </select>
        </div>
        <div class="all-list">
             <select name="seats" id="seats" class="cinema-list">
                <option value="">Select City</option>
            </select>
        </div>
        {{ csrf_field() }}
    </div>
</section>

@endsection
<script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>
