<!DOCTYPE html>
<html lang="en">
@extends('layouts.master')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('title','create-acount')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>

@section('content')

<section style="padding-top:50px;">
    <div class="container">
        <div class="row">
              <div class="col-md-6 offset-md-3">
                  <div class="card">
                        <div class="card-header">Create Acount</div>
                        @if(session()->get('success'))
                          <div class="alert alert-success">
                        {{ session()->get('success') }}
                          </div>
                         @endif
                         @if(session()->get('fail'))
                          <div class="alert alert-danger">
                        {{ session()->get('fail') }}
                          </div>
                         @endif
                        <div class="card-body">
                            <form action="register_process" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control"required>
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" name="password" class="form-control"required>
                                </div><br>
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                        </div>
                  </div>
              </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
@endsection