@extends('layouts.default')
@section('content')
<style type="text/css">
	#profile{
		padding-bottom: 50px;
	}
	.title-style {
	    margin-bottom: 5%;
	    color:black;
	    text-decoration: underline;
	}
	.row{
		padding-left: 2%;
		padding-right: 2%;
	}
	.sort th{
		width: 40%;
	}
	.card{
		margin-bottom: 25px;
	}
	.heading{
		margin-bottom: 5%;
		text-decoration: underline;
		font-size: 25px;
	}
	
	.card-block ul li{
	    padding: 10px 0;
	    font-size: 16px;
	    border-bottom: 1px solid #eee;
	}
/*	.row {
    margin-right: 0.0625rem;
    margin-left: 0.0625rem;
}*/
</style>
<br>
<section id="profile" class="parallax-section">
	<?php $detail = $details[0]; ?>
	<div class="row">
		<div class=" text-center">
			<h1 class="heading">My Profile</h1>
		</div>
    	<div class="col-md-3 col-sm-12 col-xs-12 pull-right">
			<div class="card">
			    <!--Card image-->
			    <div class="view overlay hm-white-slight">
			        @if($detail->photo)
						<img class="img-fluid" src="{{url('photo/'.$detail->photo)}}" alt="{{$detail->name}}" style="margin-bottom:6px;">
					@else
						<img class="img-fluid" src="{{url('images/user.jpg')}}" alt="{{$detail->name}}" style="margin-bottom:6px;">
					@endif
			        <a href="#">
			            <div class="mask"></div>
			        </a>
			    </div>
			    <!--Card content-->
			    <div class="card-block">
			        <!--Text-->
			        <ul>
			            <!-- <li><strong>No of Members In company</strong> 5000</li> For profile viewer -->
			            <li><strong>Name:</strong> {{$detail->firstname}} {{$detail->middlename}} {{$detail->lastname}} </li>
			            <li><strong>Date of birth:</strong> {{$detail->date_of_birth->toFormattedDateString()}} ({{$detail->date_of_birth->diffInYears()}} years old)</li>
			            <li><strong>Expertise In:</strong> {{$detail->expertise_in}}</li>
						<li><strong>Retirement Date:</strong> {{$detail->retirement->toFormattedDateString()}} (At the age of {{$detail->retirement->diffInYears($detail->date_of_birth)}})</li>
			            <li><strong>Current Location:</strong> {{$detail->address_current}} {{$detail->city_current}} {{$detail->state_current}} {{$detail->country_current}}</li>
			            <li><strong>Phone:</strong> {{$detail->contact_mobile}}</li>
			            <li><strong>Email:</strong> {{$detail->email_personal}}</li>
			          </ul>
			    </div>
			    <!--/.Card content-->
			</div>
		</div>	
		<div class="col-md-9 col-sm-12 col-xs-12">			
			<div class="card">
				<div class="col-md-6">
					<table class="table sort">
					  <tbody>
					    <tr>
					      <th scope="row">Gender:</th>
					      <td>{{$detail->gender}}</td>
					    </tr>
					    <tr>
					      <th scope="row">Home Contact no:</th>
					      <td>{{$detail->contact_home}}</td>
					    </tr>
					    <tr>
					      <th scope="row">Other Contact no:</th>
					      <td>{{$detail->contact_other}}</td>
					    </tr>
					    <tr>
					      <th scope="row">Fax Contact no:</th>
					      <td>{{$detail->contact_fax}}</td>
					    </tr>
					    <tr>
					    	<th scope="row">Pager Contact no:</th>
					    	<td>{{$detail->contact_pager}}</td>
					    </tr>
					  </tbody>
					</table>
		    	</div>
		    	<div class="col-md-6">
		    		<table class="table sort">
					  <tbody>
					    <tr>
					      <th scope="row">Goals:</th>
					      <td>{{$detail->goals}}</td>
					    </tr>
					    <tr>
					      <th scope="row">Interest</th>
					      <td>{{$detail->interests}}</td>
					    </tr>
					    <tr>
					      <th scope="row">Other Email ID:</th>
					      <td>{{$detail->email_other}}</td>
					    </tr>
					    <tr>
					      <th scope="row">Skype ID</th>
					      <td>{{$detail->skype}}</td>
					    </tr>
					  </tbody>
					</table>
		    	</div>
		    </div>
		    <div class="card">
		    	<div class="col-md-12">
		    		<table class="table table-responsive">
					  <tbody>	    
					    <tr>
					    	<th>Website link:</th>
					    	<td><a href="{{$detail->website}}">{{$detail->website}}</a></td>
					    </tr>
					    <tr>
					    	<th>Google+ link:</th>
					    	<td><a href="{{$detail->google}}">{{$detail->google}}</a></td>
					    </tr>
					    <tr>
					    	<th>Facebook Profile link:</th>
					    	<td><a href="{{$detail->fb}}">{{$detail->fb}}</a></td>
					    </tr>
					    <tr>
					    	<th>LinkedIn Profile link:</th>
					    	<td><a href="{{$detail->linkedin}}">{{$detail->linkedin}}</a></td>
					    </tr>
					   </tbody>
					</table>    
		    	</div>
		    </div>
		    <div class="card">
		    	<div class="col-md-12">
		    		<table class="table">
					  <tbody>
					    <tr>
					      	<th scope="row">Permanent Address:</th>
							<?php
							$address = array($detail->address_permanent, $detail->city_permanent, $detail->state_permanent, $detail->country_permanent);
							$address = array_filter($address);
							$s = implode(', ', $address);
							?>
					      	<td>{{$s}}. 
					      	@if($detail->pincode_permanent)
						      	Pin Code-{{$detail->pincode_permanent}}
						    @endif
						   	</td>
					    </tr>
					    <tr>
					      	<th scope="row">Current Address:</th>
					      	<?php
							$address = array($detail->address_current, $detail->city_current, $detail->state_current, $detail->country_current);
							$address = array_filter($address);
							$s = implode(', ', $address);
							?>
					      	<td>{{$s}}
					      	@if($detail->pincode_current)
						      	Pin Code-{{$detail->pincode_current}}
						    @endif
						   	</td>
					    </tr>
					    <tr>
					      	<th scope="row">Alternate Address:</th>
					      	<?php
							$address = array($detail->address_alternate, $detail->city_alternate, $detail->state_alternate, $detail->country_alternate);
							$address = array_filter($address);
							$s = implode(', ', $address);
							?>
					      	<td>{{$s}}
					      	@if($detail->pincode_alternate)
						      	Pin Code-{{$detail->pincode_alternate}}
						    @endif
						   	</td>
					    </tr>
					    <tr>
					      <th scope="row">Biography:</th>
					      <td>{{$detail->biography}}</td>
					    </tr>
					   </tbody>
					 </table>
				</div>
		    </div>							
		</div>	
	</div>
	</div>		
</section>
@stop