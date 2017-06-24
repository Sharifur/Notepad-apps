@extends('Master')
@section("content")
<style> 
    .note-img{
        max-width: 200px;
        height: 200px;
        box-shadow: 0px 0px 0px 0px #737373;
    }
    .img-responsive.npic{
        max-width: 200px;
        height: 200px;
    }
</style>
<!-- Page Header -->
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        @if(file_exists("images/profile/pic-{$id}.{$alldata->picture}"))
        <img src="{{url('/')}}/images/profile/pic-{{Auth::user()->id}}.{{$alldata->picture}}" width="100" height="100" class="img-circle p-image"/>
        @else
        @if($alluser->gender == "male")
        <img src="{{url('/')}}/images/male.png" width="200" class="img-circle p-image" /> 
        @else
        <img src="{{url('/')}}/images/female.png" width="200" class="img-circle p-image"/> 
        @endif
        @endif 

        <h6 class="alert alert-success text-center "> <span class="name text-center" >{{Auth::user()->name}}</span><br>
            Welcome To The Personal Notebook Apps  </h6>
    </div>
    <div class="col-lg-12">
        <h1 class="page-header">All Notes</h1>
    </div>
</div>
<!-- /.row -->

<!-- Projects Row -->
<div class="row">
    @foreach($allnotes as $note)
    <div class="col-md-3 portfolio-item clearfix">
        @if(file_exists("images/notes/npic-{$note->id}.{$note->picture}"))
        <a href="{{url('/')}}/notes/show/{{$note->id}}">
            <img class="img-responsive npic" src="{{url('/')}}/images/notes/npic-{{$note->id}}.{{$note->picture}}" alt="">
        </a>
        @else
        <a href="{{url('/')}}/notes/show/{{$note->id}}">
            <img class="img-responsive npic" src="{{url('/')}}/images/no-note.png" alt="">
        </a>
        @endif
        <h3>
            <a href="{{url('/')}}/notes/show/{{$note->id}}">{{$note->title}}</a>
        </h3>
        
    </div>
    @endforeach

</div>
<!-- /.row -->

<!-- Projects Row -->

<!-- /.row -->

<hr>

<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
        <ul class="pagination">
            <li>
                <a href="#">&laquo;</a>
            </li>
            <li class="active">
                <a href="#">1</a>
            </li>
            <li>
                <a href="#">2</a>
            </li>
            <li>
                <a href="#">3</a>
            </li>
            <li>
                <a href="#">4</a>
            </li>
            <li>
                <a href="#">5</a>
            </li>
            <li>
                <a href="#">&raquo;</a>
            </li>
        </ul>
    </div>
</div>
<!-- /.row -->

<hr>

<!-- Footer -->

@endsection