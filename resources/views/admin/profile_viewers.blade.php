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
                    <b class=" ">{{$viewer->firstname}}</b>
                    </span>
                </div>
                    <div class="col-md-10">
                         <!--Card content-->
                        <div class="card-block">
                            <div class="row">
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Description :</b>
                               </div>
                               <div class="col-sm-12 col-md-10 text-xs-left">
                                  <p>{{$viewer->description}}.</p>
                               </div>
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Website :</b>
                               </div>
                               <div class="col-sm-12 col-md-10 text-xs-left">
                                  <p>{{$viewer->website}}</p>
                               </div>
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Location :</b>
                               </div>
                               <div class="col-sm-12 col-md-10 text-xs-left">
                                  <p>{{$viewer->city_permanent}} {{$viewer->state_permanent}} 
                                  {{$viewer->country_permanent}}</p>
                               </div>                               
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Company Started :</b>
                               </div>
                               <div class="col-sm-12 col-md-4 text-xs-left">
                                  <p>{{ $viewer->date_of_birth->diffForHumans()}}</p>
                               </div>
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Profession :</b>
                               </div>
                               <div class="col-sm-12 col-md-4 text-xs-left">
                                  <p>{{$viewer->expertise_in}}</p>
                               </div>
                            </div>
                            <a href="#" class="btn btn-primary pull-xs-right">Edit</a>
                            <a href="#" class="btn btn-primary pull-xs-right">Full Profile</a>
                        </div>
                        <!--/.Card content-->
                    </div>
                </div>
            </div>
            {{-- card : end --}}
            
        @endforeach
        @endif
        	<div class="pagination">{{ $profileViewers->links() }}</div>
        </div>
        <div class="col-md-1"></div>    
    </div>
    </div>
</section>

@stop
