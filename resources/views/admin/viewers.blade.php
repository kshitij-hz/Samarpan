@extends('layouts.default')
@section('content')
<section id="contact" class="parallax-section">
	<div class="container">
	<div class="row">
        <div class="col-md-1"></div>
	    <div class="col-md-10 col-sm-12 text-center">
		<h1 class="heading">Results : Profile Viewers</h1>
		
        @if($profileViewers)
        @foreach($profileViewers as $profileViewer)
        <?php $viewer = $profileViewer[0]; ?>
        
            {{-- card : begin --}}
            <div class="card">
                <div class="row">
                    <div class="col-md-2" style="padding: 1% 0% 0% 3%;">
                      <!--Card image-->
                    <center>
                        @if($viewer->photo)
                            <img class="img-fluid" src="{{url('photo/'.$viewer->photo)}}" alt="{{$viewer->name}}" style="margin-bottom:6px;">
                        @else
                            <img class="img-fluid" src="{{url('images/user.jpg')}}" alt="{{$viewer->name}}" style="margin-bottom:6px;">
                        @endif
                    </center>
                      <!--/.Card image-->
                    <span>
                    <b class=" ">{{$viewer->firstname}} {{$viewer->middlename}} {{$viewer->lastname}}</b>
                    </span>
                </div>
                    <div class="col-md-10">
                         <!--Card content-->
                        <div class="card-block">
                            <div class="row">
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Expertise :</b>
                               </div>
                               <div class="col-sm-12 col-md-10 text-xs-left">
                                  <p>{{$viewer->expertise_in}}.</p>
                               </div>
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Interests :</b>
                               </div>
                               <div class="col-sm-12 col-md-10 text-xs-left">
                                  <p>{{$viewer->interests}}.</p>
                               </div>
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Retirement :</b>
                               </div>
                               <div class="col-sm-12 col-md-10 text-xs-left">
                                  <p>{{$viewer->retirement->diffForHumans()}} (At the age of 
                                  {{$viewer->retirement->diffInYears($viewer->date_of_birth)}})</p>
                               </div>                               
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Age :</b>
                               </div>
                               <div class="col-sm-12 col-md-4 text-xs-left">
                                  <p>{{ $viewer->date_of_birth->diffInYears()}} years old</p>
                               </div>
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Location :</b>
                               </div>
                               <div class="col-sm-12 col-md-4 text-xs-left">
                                  <p>{{$viewer->address_current}} {{$viewer->city_current}}</p>
                               </div>
                            </div>
                            <a href="#" class="btn btn-primary pull-xs-right">Edit</a>
                            <a href="#" class="btn btn-primary pull-xs-right">Full Profile</a>
                            <a href="#" class="btn btn-primary pull-xs-right">Resume</a>
                        </div>
                        <!--/.Card content-->
                    </div>
                </div>
            </div>
            {{-- card : end --}}
        @endforeach
        @endif
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10 col-sm-12">
            <div class="pagination">{{ $profileViewers->render() }}</div>    
        </div>
        
    </div>
    </div>
</section>

@stop
