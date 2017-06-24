@extends('Master')
@section('content')
<style> 
    .pl{
        padding-left: 20px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading text-center"> 
                    <h3>{{$allnotes->title}}</h3>
                </div>
                <div class="panel-body text-center">
                    <div class="col-md-4 text-center">
                        @if(file_exists("images/notes/npic-{$allnotes->id}.{$allnotes->picture}"))
                        <img class="img-responsive npic" src="{{url('/')}}/images/notes/npic-{{$allnotes->id}}.{{$allnotes->picture}}" alt="">
                        @else
                        <img class="img-responsive npic" src="{{url('/')}}/images/no-note.png" alt="">
                        @endif
                    </div>
                    <div class="col-md-8 text-center">
                        {{$allnotes->description}}
                    </div>
                </div>
                <div class="panel-footer pull-right">
                    <a href="{{url('/')}}/notes/edit/{{$allnotes->id}}" class="glyphicon glyphicon-edit pl">Ediit</a>
                    <a href="{{url('/')}}/notes/delete/{{$allnotes->id}}" class="glyphicon glyphicon-trash pl">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection