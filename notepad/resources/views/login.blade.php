<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Personal Notebook </title>



        <link rel="stylesheet" href="{{url("/")}}/css/style.css">


    </head>

    <body>

        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <header style="text-align: center;">Login</header>
            <label>Email <span>*</span></label>
            <input type="email" name="email"  placeholder="Enter Your Email"/>

            <label>Password <span>*</span></label>
            <input type="password" name="password" placeholder="Enter Your Password"/>

            <button>Login</button>
            <a class="alink" href="{{url('/register')}}">Register</a>
        </form>


    </body>
</html>
