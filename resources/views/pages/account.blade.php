@extends('layouts.default')
@section('content')
<section id="account" class="parallax-section" >
	<div class="container">
		{{--  --}}
		<div class="row" id="accordion">
			<div class="col-md-offset-2 col-md-8 col-sm-12 collapse" id="register" data-parent="#accordion">
				<div class="card" style="background:rgba(255,255,255,0.74)">
					<div class="title-style text-center" style="background:rgba(244,67,54,0.74)">
						<h1 class="heading">Create Profile</h1>
					</div>	
					<div class="content">
						<form action="{{ url('/register') }}" method="post">
						{{ csrf_field() }}
						@if(!empty(old('register')))
                          <?php $reg_email = old('email'); 
                                $reg_email_color = $errors->has('email') ? ' has-error' : '';
                                $reg_psswd_color = $errors->has('password') ? ' has-error' : '';
                          ?>
                        @else 
                          <?php $reg_email = $reg_email_color = $reg_psswd_color = ''; ?> 
                        @endif
							<div class="md-form">
								<select class="mdb-select" name="type"  value="{{ old('type') }}" required>
								    <option value="" disabled selected>Choose type of account</option>
								    <option value="2" @if (Input::old('type') == '2') selected="selected" @endif>Senior Citizen</option>
								    <option value="1" @if (Input::old('type') == '1') selected="selected" @endif>Profile Viewer</option>
								    <option value="3" @if (Input::old('type') == '3') selected="selected" @endif>Department</option>
								</select>
							</div>
							<div class="md-form">
								<input name="name" type="text" class="form-control" id="name" placeholder="Name"  value="{{ old('name') }}" required>
								@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="md-form">
								<input name="email" type="email" class="form-control" id="email" placeholder="Email"  value="{{ $reg_email }}" required>
								@if ($errors->has('email') && !empty(old('register')))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="md-form">
								<input name="contact" type="number" class="form-control" placeholder="Contact Number"  value="{{ old('contact') }}" required>
								@if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="md-form">
								<input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
								@if ($errors->has('password') && !empty(old('register')))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="md-form">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
								@if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="md-form">
								<button type="submit" class="btn btn-primary" name="register" value="register"><i class="fa fa-btn fa-user"></i> Register</button>
							</div>
							<div class="md-form">
								<a class="btn teal" aria-expanded="false" id="click2">Already Have an Account, Login here?</a>
						  	</div>
						</form>
					</div>	
				</div>
			</div>

			<div class="col-md-offset-2 col-md-8 col-sm-12 collapse in" id="login" data-parent="#accordion">
				<div class="card text-center" style="background:rgba(255,255,255,0.74)">
					<div class="title-style" style="background:rgba(244,67,54,0.74)">
						<h1 class="heading" >Login</h1>
					</div>	
					<div class="login">
					<form action="login" method="post">
							{{csrf_field()}}
							@if(empty(old('register')) && !empty(old('email')))
	                          <?php $login_email = old('email'); 
	                                $login_email_color = $errors->has('email') ? ' has-error' : '';
	                                $login_psswd_color = $errors->has('password') ? ' has-error' : '';
	                          ?>
	                        @else 
	                          <?php $login_email = $login_email_color = $login_psswd_color = ''; ?> 
	                        @endif
							<div class="form-group{{ $login_email_color }}">
								<input name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{ $login_email }}" required>
								@if ($errors->has('email') && empty(old('register')) && !empty(old('email')))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group{{  $login_psswd_color }}">
								<input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
								@if ($errors->has('password') && empty(old('register')) && !empty(old('email')))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
						  	</div>
							<div class="md-form">
								<button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-sign-in"></i> Login</button>
								<a class="btn btn-secondary" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
						  	</div>
						  	<div class="md-form">
								<a class="btn teal" id="click1" aria-expanded="false">Don't Have an Account, Register here?</a>
						  	</div>
						</form>  
						<!-- <span>...or login with</span><br><br> -->
						<!--Facebook-->
						<!-- <button type="button" class="btn btn-fb"><i class="fa fa-facebook"></i></button> -->
						<!--Twitter-->
						<!-- <button type="button" class="btn btn-tw"><i class="fa fa-twitter"></i></button> -->
						<!--Google +-->
						<!-- <button type="button" class="btn btn-gplus"><i class="fa fa-google-plus"></i></button> -->
					</div>	
				</div>
			</div>
		</div>
		{{--  --}}
	
	</div>		
</section>
@stop