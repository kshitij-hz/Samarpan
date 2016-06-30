@extends('layouts.default')
@section('content')
<section id="home" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h1>SAMARPAN</h1><br>
				<h4>because</h4>
				<a class="btn btn-danger-outline">OLD IS GOLD</a>
			</div>
		</div>
	</div>		
</section>

<section id="team" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-5 col-sm-12" id="register">
				<div class="card">
					<div class="title-style text-center">
						<h1 class="heading">Create Profile</h1>
					</div>	
					<div class="content">
						<form action="{{ url('/register') }}" method="post">
						{{ csrf_field() }}
							<div class="md-form">
								<select class="mdb-select" name="type">
								    <option value="" disabled selected>Choose type of account</option>
								    <option value="2">Senior Citizen</option>
								    <option value="1">Profile Viewer</option>
								    <option value="3">Department</option>
								</select>
							</div>
							<div class="md-form">
								<input name="name" type="text" class="form-control" id="name" placeholder="Name">
								@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="md-form">
								<input name="email" type="email" class="form-control" id="email" placeholder="Email">
								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="md-form">
								<input name="contact" type="number" class="form-control" placeholder="Contact Number">
								@if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="md-form">
								<input name="password" type="password" class="form-control" id="password" placeholder="Password">
								@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="md-form">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
								@if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="md-form">
								<input name="submit" type="submit" class="form-control" id="submit" value="Register">
							</div>
						</form>
					</div>	
				</div>
			</div>

			<div class="col-md-offset-1 col-md-5 col-sm-12" id="login">
				<div class="card text-center">
					<div class="title-style">
						<h1 class="heading">Login</h1>
					</div>	
					<div class="login">
						<form action="login" method="post">
							{{csrf_field()}}
							<div class="md-form">
								<input name="email" type="email" class="form-control" id="email" placeholder="Email">
							</div>
							<div class="md-form">
								<input name="password" type="password" class="form-control" id="password" placeholder="Password">
						  	</div>

						  <div class="md-form">
								<input name="submit" type="submit" class="form-control" id="submit" value="Submit">
						  </div>
						</form>  
						<span>...or login with</span><br><br>
						<!--Facebook-->
						<button type="button" class="btn btn-fb"><i class="fa fa-facebook"></i></button>
						<!--Twitter-->
						<button type="button" class="btn btn-tw"><i class="fa fa-twitter"></i></button>
						<!--Google +-->
						<button type="button" class="btn btn-gplus"><i class="fa fa-google-plus"></i></button>
					</div>	
				</div>
			</div>
		</div>
	</div>		
</section>

<!-- contact section -->
<section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
				<h1 class="heading">Contact Us</h1>
				<hr>
			</div>
			<div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
				<form action="contact" method="post">
					<div class="col-md-6 col-sm-6 md-form">
						<input name="name" type="text" class="form-control" id="name" placeholder="Name">
				  	</div>
					<div class="col-md-6 col-sm-6 md-form">
						<input name="email" type="email" class="form-control" id="email" placeholder="Email">
				 	</div>
					<div class="col-md-12 col-sm-12 md-form">
						<textarea name="message" rows="8" class="md-textarea form-control" id="message" placeholder="Message"></textarea>
					</div>
					<div class="md-form col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
						<input name="submit" type="submit" class="form-control" id="submit" value="send message">
					</div>
				</form>
			</div>
			<div class="col-md-2 col-sm-1"></div>
		</div>
	</div>
</section>
@stop