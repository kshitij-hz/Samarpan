@extends('layouts.default')
@section('content')
<section id="contact" class="parallax-section">
	<div class="container">
	<div class="row">
	    <div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
		<h1 class="heading">Verification</h1>
		
        {{-- card : begin --}}
        <div class="card">
        @if(isset($verify_mail))
          Mail has been send to {!! $verify_mail !!}
          Please confirm your account.
        @endif
        @if(isset($verify_mail_fail))
          Verification failed !! <a href="{{{ url('/verification') }}}">Click here</a> to resend the new confirmation link to <b>{!! $verify_mail_fail !!} </b>
        @endif
                   </div>
        {{-- card : end --}}
    </div>
    </div>
  </div>  
</section>

@stop
