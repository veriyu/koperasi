<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Gentelella -->
    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors_gentelella\bootstrap\dist\css\bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors_gentelella/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors_gentelella/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('assets/vendors_gentelella/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets/vendors_gentelella/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->

    <link href="{{ asset('assets/vendors_gentelella/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">
    <!-- Gentelella -->
</head>
<body class="login">
	<div>
	  <a class="hiddenanchor" id="signup"></a>
	  <a class="hiddenanchor" id="signin"></a>

	  <div class="login_wrapper">
	    <div class="animate form login_form">
	      <section class="login_content">
	 		

		 		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
	            </div>

	            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
	            </div>
          

	        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
	        	{{ csrf_field() }}

             
	          <h1>Login Form</h1>
	          <div>
	            <input type="text" name="email" class="form-control"  value="{{ old('email') }}" placeholder="Username" />
	          </div>
	          <div>
	            <input type="password" name="password" class="form-control" placeholder="Password" />
	          </div>
	          <div>
	            <button name="Submit" class="btn btn-default submit">Submit</button>
	            {{-- <a class="btn btn-link" href="{{ url('/password/reset') }}">Lost your password?</a> --}}
	          </div>

	          <div class="clearfix"></div>

	          <div class="separator">
	            <p class="change_link">New to site?
	              <a href="#signup" class="to_register"> Create Account </a>
	            </p>

	            <div class="clearfix"></div>
	            <br />

	            <div>

	            </div>
	          </div>
	        </form>
	      </section>
	    </div>

	    <div id="register" class="animate form registration_form">
	      <section class="login_content">
	        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        	{{ csrf_field() }}
	          <h1>Create Account</h1>

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="User Name" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
              </div>

	          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

              </div>

	          
	          	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
              	</div>

			  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                {{-- <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label> --}}

                
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif

              </div>

	          <div>
	            <!-- <a class="btn btn-default submit" href="index.html">Submit</a> -->
	            <button name="Submit" class="btn btn-default submit">Submit</button>
	          </div>

	          <div class="clearfix"></div>

	          <div class="separator">
	            <p class="change_link">Already a member ?
	              <a href="#signin" class="to_register"> Log in </a>
	            </p>

	            <div class="clearfix"></div>
	            <br />

	            <div>
	              <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> -->
	              <!-- <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p> -->
	            </div>
	          </div>
	        </form>
	      </section>
	    </div>
	  </div>
	</div>


</body>
</html>