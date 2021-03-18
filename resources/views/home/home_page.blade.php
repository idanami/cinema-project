<!DOCTYPE html>
<html>
@extends('layouts.master')
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @section('title','cinema home')

</head>
<body>
    @section('content')
    <section class="cinema">
    <div class="cinema-list">
        <div class="all-list">
            <select name="cinema" id="cinema" class="cinema-list_name">
                <option value="">Select Cinema</option>
                    @foreach($cinema_list as $cinema)
                        <option value="{{ $cinema->id }}">{{ $cinema->name }} - {{$cinema->address}} </option>
                    @endforeach
            </select>
        </div>
        <div class="all-list">
            <select class="movies-list_name" id="movie">
                <option value="">Select Movie</option>
            </select>
        </div>
        <div class="all-list">
             <select name="seats" id="times" class="times-list_name">
                <option value="">Select Time</option>
            </select>
        </div>

        <div class="seats_num" id="seats_list">
                    @foreach($cinema_list as $cinema)
                        <div>{{ $cinema->seats }}</div>
                    @endforeach
        </div>


        {{ csrf_field() }}
    </div>
    </section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>>

<script type="text/javascript">
    $(document).ready(function(){

        var seats_list = document.getElementById('seats_list');
        // seats_list.style.display="block";

        $('.cinema-list_name').change(function(){
            var cinema_id=$(this).val();
            var op=" ";
            $.ajax({
				type:'get',
				url:"{{ route('fetchmovie') }}",
				data:{'id':cinema_id},
                success:function(data){
                    op+='<option value="0" selected disabled>Select Movie</option>';
					for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                $(".movies-list_name").html(" ");
                $(".movies-list_name").append(op);

            },
            });
        });

        $('.movies-list_name').change(function(){
            var movie_id=$(this).val();
            var cinema_id=$("#cinema").val();
            var op=" ";
            $.ajax({
				type:'get',
                url:"{{ route('fetchtimes') }}",
                data:{'movie_id':movie_id , 'cinema_id':cinema_id},
                success:function(data){
                    op+='<option value="0" selected disabled>Select Time</option>';
					for(var i=0;i<data.length;i++)
                        op+='<option value="'+data[i].id+'">'+data[i].screening_time+'</option>';
                $(".times-list_name").html(" ");
                $(".times-list_name").append(op);
            },
            });
        });

    });


    </script>
</body>
</html>

