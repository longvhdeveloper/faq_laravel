<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">
        <title>Sign up - FAQ page
        </title>
        <!-- Bootstrap core CSS -->
        <link href="{{asset('public/css/site/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/site/mystyle.css')}}" rel="stylesheet">
        <link href="{{asset('public/css/site/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- Custom styles for this template -->
        {{-- <link href="jumbotron.css" rel="stylesheet"> --}}
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{URL::to('/')}}">FAQ page</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 content signin_form">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sign up</h3>
                        </div>
                        <div class="panel-body">
                        @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{Session::get('error')}}
                        </div>
                        @endif

                        @if(isset($error))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{$error}}
                        </div>
                        @endif

                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{Session::get('success')}}
                        </div>
                        @endif
                        {{Form::open(array('route' => 'do_signup'))}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    {{Form::label('firstname', 'First name')}}
                                    {{Form::text('firstname', Input::old('firstname'), array('class' => 'form-control', 'placeholder' => 'First name'))}}
                                </div>
                                <div class="col-md-6">
                                    {{Form::label('lastname', 'Last name')}}
                                    {{Form::text('lastname', Input::old('lastname'), array('class' => 'form-control', 'placeholder' => 'Last name'))}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                           {{Form::label('username', 'Username')}}
                                {{Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'Username'))}}
                        </div>

                        <div class="form-group">
                            {{Form::label('email', 'Email')}}
                            {{Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email'))}}
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    {{Form::label('password', 'Password')}}
                                    {{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
                                </div>
                                <div class="col-md-6">
                                    {{Form::label('repassword', 'Re-Password')}}
                                    {{Form::password('repassword', array('class' => 'form-control', 'placeholder' => 'Re-Password'))}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('recaptcha_response_field', 'Recaptcha')}}
                            {{Form::captcha()}}
                        </div>

                        <div class="form-group">
                            {{Form::submit('Sign up', array('class' => 'btn btn-success pull-right'))}}
                        </div>
                        {{Form::close()}}
                        </div>
                    </div>
                </div><!-- end of section-->
                <div class="col-md-3"></div>
            </div>
            <hr>
            <footer>
                <p>Copyright &copy; FAQ site, 2015</p>
            </footer>
        </div> <!-- /container -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="{{asset('public/js/site/bootstrap.min.js')}}"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    </body>
</html>