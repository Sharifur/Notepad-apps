<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Personal Notebook </title>
        <link rel="stylesheet" href="{{url("/")}}/css/style.css">
    </head>
    <body>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <header>Register</header>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                <label for="gender" class="col-md-4 control-label">Select Gender  :</label>
                    <select name="gender">
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                    <a class="alink" href="{{url('/login')}}">Login</a>
                </div>
            </div>
        </form>
    </body>
</html>
