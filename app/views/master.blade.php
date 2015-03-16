<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">
        <title>@section('titlepage')FAQ page
        @show
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
        @include('template.top')
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-9 content">
                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('error')}}
                    </div>
                    @endif

                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @yield('content')
                </div>
                <div class="col-md-3">
                    @include('template.menu')
                </div><!-- end of section-->
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