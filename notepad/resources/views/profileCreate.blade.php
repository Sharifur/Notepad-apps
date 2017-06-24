<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Personal Notebook </title>
        <link rel="stylesheet" href="{{url("/")}}/css/style.css">
    </head>
    <body>
        <form class="form-horizontal" role="form" method="POST" action="{{url('/profile-create') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <header>Create Your Profile</header>
            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                
                <label for="name" class="col-md-4 control-label">City</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="city" value="{{ old('city') }}" required autofocus>

                    @if ($errors->has('city'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                <label for="country" class="col-md-4 control-label">Country</label>

                <div class="col-md-6">
                    <input id="email" type="text" class="form-control" name="country" value="{{ old('country') }}" required>

                    @if ($errors->has('country'))
                    <span class="help-block">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="col-md-4 control-label">Address</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control" name="address" required>

                    @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="picture" class="col-md-4 control-label">Profile picture</label>

                <div class="col-md-6">
                    <input  type="file" name="picture"  >
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Continue
                    </button>
                    
                </div>
            </div>
        </form>
    </body>
</html>
