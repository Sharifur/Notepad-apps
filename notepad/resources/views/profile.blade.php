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
                    <h1> Welcome To Your Profile</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">

                            @if(file_exists("images/profile/pic-{$id}.{$alldata->picture}"))
                            <img src="{{url('/')}}/images/profile/pic-{{Auth::user()->id}}.{{$alldata->picture}}" width="220" height="220" />
                            @else
                            @if($alluser->gender == "male")
                            <img src="{{url('/')}}/images/male.png" width="200" class="img-circle pp-image" /> 
                            @else
                            <img src="{{url('/')}}/images/female.png" width="200" class="img-circle pp-image"/> 
                            @endif
                            @endif 

                            <br/><br/>
                            

                        </div>
                        <div class="col-md-8">
                            <h4> Name : {{Auth::user()->name}}</h4>
                            <h4> Email : {{Auth::user()->email}}</h4>
                            @if($alluser->gender == "male")
                            <h4> Gender : Male </h4>
                            @else
                            <h4> Gender :  Female </h4>
                            @endif

                            @if($alldata->city == "")
                            <h4> City : No City Given</h4>
                            @else
                            <h4> City : {{$alldata->city}}</h4>
                            @endif

                            @if($alldata->country == "")
                            <h4> Country : No Country Given</h4>
                            @else
                            <h4> Country : {{$alldata->country}}</h4>
                            @endif

                            @if($alldata->address == "")
                            <h4> Address : No Address Given</h4>
                            @else
                            <h4> Address : {{$alldata->address}}</h4>
                            @endif

                            <a href="{{url('/profile')}}/{{Auth::user()->id}}/edit" ><i class="fa fa-pencil-square-o ficon" aria-hidden="true"><span class="p-text">Edit Profile</span></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection