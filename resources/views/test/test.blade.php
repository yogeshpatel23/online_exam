@extends('layouts.app')

@if(count($booklates->questions)>0)
@section('title',$booklates->booklate_name)

@section('content')
<style>
    .que{
        height: 70vh;
    }
</style>

<h1 id="exam-time" class="bg-blue" >{{$booklates->booklate_name}}</h1>
<form action="/test/{{$booklates->qbid}}" method="post">
    @csrf
<div class="row">
    <input type="hidden" id=userid  name="userid" value="{{ Auth::user()->id}}">
    <input type="hidden" id=qbid name="qbid" value="{{$booklates->qbid}}">
    <div class="col-md-9">
        <?php $i=1; ?>
        @foreach($booklates->questions as $question)
            <div id="div<?php echo $i ?>" class="box box-success que hide">
                <div class="box-header bg-aqua with-border">
                    <h3 class="box-title" >Question No. <?php echo $i ?></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{ $question->questions }}</p>
                        </div>
                        <div class="col-md-6">
                            <div class="radio">
                                <label><input type="radio" name="que[{{ $question->qusid }}]" value="{{ $question->opt_a }}"> {{ $question->opt_a }}</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="que[{{ $question->qusid }}]" value="{{ $question->opt_b }}"> {{ $question->opt_b }}</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="que[{{ $question->qusid }}]" value="{{ $question->opt_c }}"> {{ $question->opt_c }}</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="que[{{ $question->qusid }}]" value="{{ $question->opt_d }}"> {{ $question->opt_d }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php $i++; ?>
        @endforeach

        <a class="btn btn-info" id="prev"><i class="fa fa-backward"></i> Previous</a>
        <a class="btn btn-info" id="next">Next <i class="fa fa-forward"></i></a>
        <input type="submit" class="btn btn-danger pull-right" value="Submit">
        {{-- <button class="btn btn-danger pull-right" id="btnsubmit" onclick="examsubmit();">Submit</button> --}}
    </div>
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border bg-green">
                <h3 class="box-title">Question List</h3>
            </div>
            <div class="box-body">
                <div class="qlist">    </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
@endif

@section('script')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function(){
        //side bar collapse
        $('.side-navbar').addClass('shrinked');
        $('.content-inner').addClass('active');

        //questin diplay logic
        $('.que').first().removeClass('hide');
        var divid;
        var cdiv = $('.que').not('.hide').attr('id');
        divid = cdiv.slice(3);
        var tdiv = $('.que').length;

        for(var i=1;i<=tdiv;i++)
        {
            $('.qlist').append('<a id="Q-'+ i +'" class="Q-no btn btn-outline-secondary" style="margin: 3px;">'+ i +'</a>');
        }

        $('#next').click(function(){
            cdiv = $('.que').not('.hide').attr('id');
            divid = cdiv.slice(3);
            divid++;
            if(divid>tdiv)
            {
                divid=1;
            }
            $('.que').addClass('hide');
            $('#div'+divid).removeClass('hide');
            //alert(divid);
        });
        $('#prev').click(function(){
            cdiv = $('.que').not('.hide').attr('id');
            divid = cdiv.slice(3);
            if(divid==1)
            {
                divid=tdiv+1;
            }
            divid--;
            $('.que').addClass('hide');
            $('#div'+divid).removeClass('hide');
                //alert(divid);
        });

        $('.Q-no').click(function(){
            cdiv = $(this).attr('id');
            divid = cdiv.slice(2);
            $('.que').addClass('hide');
            $('#div'+divid).removeClass('hide');
        });

        });
        /*=========================
            Javascripts
        =============================*/

    // for timer
    // Set the date we're counting down to
        var countDownDate = new Date().getTime()+({{ $booklates->total_time }}*60000);

        // Update the count down every 1 second
        var y = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("exam-time").innerHTML ="<i class='fa fa-clock-o'></i> " + hours + "h "
            + minutes + "m " + seconds + "s Left";

            // If the count down is finished, write some text
            if (distance < 0) {
            clearInterval(y);
            document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);

        //page refresh
        //window.onbeforeunload = function() {
        //return "Dude, are you sure you want to leave? Think of the kittens!";
        //}
</script>

 
@endsection