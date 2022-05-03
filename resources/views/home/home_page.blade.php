<!DOCTYPE html>
<html>
@extends('layouts.master')
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @section('title','cinema home')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
    @section('content')
    <section class="cinema_home">
    <div class="cinema-list">
        <div class="all-list">
            @if(session()->get('success_save'))
                <div class="alert alert-success">
                    {{ session()->get('success_save') }}
                </div>
            @endif
            <select name="cinema" id="cinema" class="cinema-list_name">
                <option value="">Select Cinema</option>
                    @foreach($cinema_list as $cinema)
                        <option value="{{ $cinema->id }}">{{ $cinema->cinema_name }} - {{$cinema->address}} </option>
                    @endforeach
            </select>
        </div>
        <div class="all-list">
            <select class="movies-list_name" id="movie">
                <option value="">Select Movie</option>
            </select>
        </div>
        <div class="all-list">
            <select name="seats" id="times" class="seats_list">
                <option value="">Select Time</option>
            </select>
        </div>
        <div class="all-list__ofseats">
            <form action="cinemaupdate_seats" method="POST" enctype="multipart/form-data" class="form_seats">
                @csrf
                <div class="all-seats" id="all-seats">
                </div>
            </form>
        </div>
        {{ csrf_field() }}
    </div>
    </section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>>

<script type="text/javascript">
    $(document).ready(function(){
        var seat_num=[];
        var seat_time=[];
        $('.cinema-list_name').change(function(){
            var cinema_id=$(this).val();
            var op=" ";
            $(".all-seats").html('  ');
            $.ajax({
				type:'get',
				url:"{{ route('fetchmovie') }}",
				data:{'id':cinema_id},
                success:function(data){
                    op+='<option value="0" selected disabled>Select Movie</option>';
					for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].movie_name+'</option>';
                    }
                $(".movies-list_name").html(" ");
                $(".movies-list_name").append(op);

            },
            });
        });

        $('.movies-list_name').change(function(){
            seat_num=[];
            seat_time=[];
            $(".all-seats").html('  ');
            var movie_id=$(this).val();
            var cinema_id=$("#cinema").val();
            var op=" ";
            $.ajax({
				type:'get',
                url:"{{ route('fetchtimes') }}",
                data:{'movie_id':movie_id , 'cinema_id':cinema_id},
                success:function(data){
                    op+='<option value="0" selected disabled>Select Time</option>';
					for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].screening_time+'</option>';
                        seat_num[i] = data[i].seats;
                        seat_time[i] = data[i].screening_time;
                    }
                    $(".seats_list").html(" ");
                    $(".seats_list").append(op);
            },
            });
        });

        $('.seats_list').change(function(){
            var seats=$('#times').val();
            var times_text = document.getElementById('times');
            $(".all-seats").html('  ');
            $.ajax({
				type:'get',
                url:"{{ route('fetchseats') }}",
                data:{'id':seats},
                success:function(data){
                var index=0;
                for(var i=0;i<seat_time.length;i++){
                    if(seat_time[i] ==  $('#times option:selected').text())
                        index=i;
                }

                let divparent=[];
                let input_seat =[];
                let div_seat=[];
                var ifsave=false;

                for(var i=0;i<=seat_num[index];i++){
                    div_seat[i] = document.createElement('div');
                    div_seat[i].setAttribute('class', 'seat-div')
                    for(var j=0;j<data.length;j++){
                        if(data[j].chair_number==i){
                        div_seat[i].textContent = data[j].owner_card;
                        ifsave=true;
                        }
                    }
                    if(ifsave){
                        $(".all-seats").append(div_seat[i]);
                        ifsave=false
                    }else{
                        input_seat[i] = document.createElement('input');
                        input_seat[i].setAttribute('class', 'seat-input')
                        input_seat[i].setAttribute('type', 'text');
                        input_seat[i].setAttribute('name', 'seat_num'+i)
                        $(".all-seats").append(input_seat[i])
                    }
                }
                var submit = document.createElement('input');
                var hidden_seat_num = document.createElement('input');
                var hidden_radiations_id = document.createElement('input');
                hidden_seat_num.setAttribute('type','hidden');
                hidden_radiations_id.setAttribute('type','hidden');
                hidden_seat_num.setAttribute('name','seatNumber');
                hidden_radiations_id.setAttribute('name','radiations_id');
                hidden_seat_num.setAttribute('value',seat_num[index]);
                hidden_radiations_id.setAttribute('value',seats);
                submit.setAttribute('type', 'submit');
                submit.setAttribute('class', 'submit_seats');
                submit.setAttribute('value', 'add seats');
                $(".all-seats").append(submit,hidden_seat_num,hidden_radiations_id);
            },
            });

        });

    });


</script>
</body>
</html>

