@extends('Master')
@section('content')
<style>
    .pp-image{
        box-shadow: 0 0px 1px 6px #000;
        padding: 5px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading text-center"> 
                    <h1> Edit Your Profile</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if(file_exists("images/profile/pic-{$id}.{$alldata->picture}"))
                            <img src="{{url('/')}}/images/profile/pic-{{Auth::user()->id}}.{{$alldata->picture}}" width="100" height="100" class="img-circle pp-image"/>
                            @else
                            @if($alluser->gender == "male")
                            <img src="{{url('/')}}/images/male.png" width="200" class="img-circle pp-image" /> 
                            @else
                            <img src="{{url('/')}}/images/female.png" width="200" class="img-circle pp-image"/> 
                            @endif
                            @endif 
                            <br/><br/>
                            <label>Change Profile picture</label>
                            <form method="POST" action="{{url('/')}}/profile/picture/{{Auth::user()->id}}" enctype="multipart/form-data" > 
                                {{csrf_field()}}
                            <input type="file" name="pic"/>
                            <p>{{Session::get('picture')}}</p>
                            <br/>
                            <input class="btn btn-primary" type="submit" value="Change" />
                            </form>
                            

                        </div>
                        <div class="col-md-8">
                            <form action="{{url('/profile')}}/{{$alldata->id}}" method="POST"  > 
                                {{csrf_field()}}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" value="{{$alldata->city}}" class="form-control" name="city"/>  
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" value="{{$alldata->country}}" class="form-control" name="country"/>  
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" value="{{$alldata->address}} " class="form-control" name="address"/>  
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection