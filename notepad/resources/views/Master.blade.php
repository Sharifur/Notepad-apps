<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Personal NoteBook</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        
        <link href="{{url('/')}}/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{url('/')}}/css/3-col-portfolio.css" rel="stylesheet">
        <link href="{{url('/')}}/css/profile/style.css" rel="stylesheet">
        <script src="{{url('/')}}/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{url('/')}}/js/bootstrap.min.js"></script>
<style>
    .p-image{
        margin-left: 120px;
        box-shadow: 0 0px 1px 6px #000;
        padding: 5px;
    }
    .name{
        line-height: 50px;
        font-size: 40px;
    }
    </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}">Personal Notebook</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <a href="{{url('/about')}}">About</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/create">Add New Notes</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/profile">Profile</a>
                        </li>
                        <<li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <div class="container">
            <!-- Page Content -->
            @yield('content')
            <!-- /.container -->
            <footer>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>Copyright &copy; Personal Notebook 2017 | All Right Reserved By Shaifur Rahman</p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>

        </div>
        <!-- jQuery -->


    </body>

</html>

