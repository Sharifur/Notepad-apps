@extends('Master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
        <div class="panel panel-default">
            <div class="panel-heading text-center"> 
                <h1> Welcome To My Profile</h1>
            </div>
            <div class="panel-body text-center">
                <h2> Sharifur Rahman</h2>
                <img src="{{url('/')}}/images/robin.jpg" width="200" height="200" class="img-circle">
                </br>
                <h4>Web Developer</h4>
                </br>
                <h4>City : Noakhali </h4>
                </br>
                <h4>City : Bangladesh</h4>
                </br>
                <h4>Email: robinmedia7@gmail.com</h4>
            </div>
            <div class="panel-footer text-center">
                
                <p> This Website is Build Only for Practice Purpose </p>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection