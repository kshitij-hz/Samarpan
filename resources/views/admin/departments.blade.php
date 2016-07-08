@extends('layouts.default')
@section('content')
<section id="contact" class="parallax-section">
	<div class="container">
	<div class="row">
        <div class="col-md-1"></div>
	    <div class="col-md-10 col-sm-12 text-center">
		<h1 class="heading">Results : Profile Viewers</h1>
		
        @if($departments)
        @foreach($departments as $department)
        <?php $department = $department[0]; ?>
        
            {{-- card : begin --}}
            <div class="card">
                <div class="row">
                    <div class="col-md-2" style="padding: 1% 0% 0% 3%;">
                      <!--Card image-->
                    <center>
                        @if($department->photo)
                            <img class="img-fluid" src="{{url('photo/'.$department->photo)}}" alt="{{$department->name}}" style="margin-bottom:6px;">
                        @else
                            <img class="img-fluid" src="{{url('images/user.jpg')}}" alt="{{$department->name}}" style="margin-bottom:6px;">
                        @endif
                    </center>
                      <!--/.Card image-->
                    <span>
                    <b class=" ">{{$department->firstname}}</b>
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
                                  <p>{{$department->description}}.</p>
                               </div>
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Website :</b>
                               </div>
                               <div class="col-sm-12 col-md-10 text-xs-left">
                                  <p>{{$department->website}}</p>
                               </div>
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Location :</b>
                               </div>
                               <div class="col-sm-12 col-md-10 text-xs-left">
                                  <p>{{$department->city_permanent}} {{$department->state_permanent}} 
                                  {{$department->country_permanent}}</p>
                               </div>                               
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Company Started :</b>
                               </div>
                               <div class="col-sm-12 col-md-4 text-xs-left">
                                  <p>{{ $department->date_of_birth->diffForHumans()}}</p>
                               </div>
                               <div class="col-sm-12 col-md-2 text-md-right text-xs-left">
                                  <b>Profession :</b>
                               </div>
                               <div class="col-sm-12 col-md-4 text-xs-left">
                                  <p>{{$department->expertise_in}}</p>
                               </div>
                            </div>
                            <a href="{{url('admin/edit', $department->user_id)}}" class="btn btn-primary pull-xs-right">Edit</a>
                            <a href="{{url('admin/view', $department->user_id)}}" class="btn btn-primary pull-xs-right">Full Profile</a>
                        </div>
                        <!--/.Card content-->
                    </div>
                </div>
            </div>
            {{-- card : end --}}
            
        @endforeach
        @endif
        	<div class="pagination">{{ $departments->links() }}</div>
        </div>
        <div class="col-md-1"></div>    
    </div>
    </div>
</section>

@stop
