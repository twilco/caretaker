
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Care Teammate Sign Up</title>

    <!-- Bootstrap core CSS -->

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/icheck/flat/green.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
          <script src="../assets/js/ie8-responsive-file-warning.js"></script>
          <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

  </head>

  <body style="background:#F7F7F7;">

    <div class="">

      <div id="wrapper">
        <div id="login">
          <section class="login_content">
            <form role="form" method="POST" action-"{{ url('/register') }}">
              {!! csrf_field() !!}
              <h1>Create Account</h1>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">

                @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif

              </div>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif

              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" >

                @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif

              </div>
              <div>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" >

                @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
                @endif

              </div>
              <div>
                <button type="submit" class="btn btn-default submit">
                  Register
                </button>
              </div>
              <div class="clearfix"></div>
              <div class="separator">

                <p class="change_link">Already a member ?
                  <a href="/login" class="to_register"> Log in </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Care Teammate</h1>

                  <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
            <!-- form -->
          </section>
          <!-- content -->
        </div>
      </div>
    </div>
  
  </body>

  </html>

  <!-- jQuery -->
  <script src="{{asset('assets/js/jquery.js')}}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>