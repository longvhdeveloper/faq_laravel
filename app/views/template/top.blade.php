<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{URL::to('/')}}">FAQ page</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            @if(!Sentry::check())
            <a class="btn btn-default pull-right signup" href="{{URL::route('forgot_password')}}">Forgot password ?</a>

            <a class="btn btn-default pull-right signup" href="{{URL::route('signup')}}">Sign up</a>

            {{Form::open(array('route' => 'signin', 'class' => 'navbar-form navbar-right'))}}
            {{Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'Username'))}}
            {{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
            {{Form::submit('Sign in', array('class' => 'btn btn-success'))}}
            {{Form::close()}}
            @else

            <div class="dropdown user-menu pull-right">
                <a href="javascript:void(0)" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                <i class="fa fa-user"></i>&nbsp;&nbsp;{{Sentry::getUser()->username}}
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Profile</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::route('change_password')}}">Change password</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::route('signout')}}">Sign out</a></li>
                </ul>
            </div>
            @endif
        </div><!--/.navbar-collapse -->
    </div>
</nav>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>FAQ page</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
    </div>
</div>