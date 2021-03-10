<!DOCTYPE html>
<html> 
@extends('layouts.master')
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
    @section('title','cinema home')
</head>
<body>
<div class="background"></div>

@section('content')
    <h1>welcome </h1>
    <h1>Name:   {{  $LoggedUserInfo->name  }} </h1>
    <h1>Email:  {{  $LoggedUserInfo->email  }} </h1>
<main class="py-4">
</main>
@endsection

</body>
</html>
