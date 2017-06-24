@extends('Master')
@section('content')
<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">Edit Note</h1>
    </div>
</div>
<!-- /.row -->

<!-- Projects Row -->
<div class="row">
    <div class="col-md-8 col-md-offset-2 portfolio-item">
        
        

        <br>
        <br>
        <br>
        @foreach($match as $note)
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('/notes/update')}}/{{$note->id}}">
            {{csrf_field()}}
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
            <div class="form-group">
                <label for="title" >Title</label>
                <input type="text" class="form-control" name="title" value="{{$note->title}}" placeholder="Enter a Title Of your Note"/>
                <h6 class="text-danger">{{$errors->first('title')}}</h6>
            </div>
            <div class="form-group">
                <label for="title" >Description</label>
                <textarea class="form-control" name="descr" rows="6">{{$note->description}}</textarea>
                <h6 class="text-danger">{{$errors->first('descr')}}</h6>
            </div>
            <br/>
            <div class="form-group">
                <label for="picture" >Select A Picture</label>
                <input type="file"  name="picture" >
                <br>
                <br/>
                @if(file_exists("images/notes/npic-{$note->id}.{$note->picture}"))
                <a href="#">
                    <img width="50" height="50" src="{{url('/')}}/images/notes/npic-{{$note->id}}.{{$note->picture}}" alt="">
                </a>
                @endif
                <h6 class="text-danger">{{$errors->first('picture')}}</h6>
                <div class="space-4"></div>
                @endforeach
                <br/>
                <div class="clearfix form-actions">
                    <div class=" col-md-9">
                        <button class="btn btn-info" type="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">

                            Reset
                        </button>
                    </div>
                </div>
        </form> 
    </div>
</div>


<hr>

<script type="text/javascript" src="https://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script type="text/javascript">

   tinymce.init({
      selector: "textarea",
      theme: "modern",
      setup: function(editor) {
         editor.on('change', function() {
            editor.save();
         });
      },
      plugins: [
         "advlist autolink lists link image charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars code fullscreen",
         "insertdatetime media nonbreaking save table contextmenu directionality",
         "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
      toolbar2: "print preview media | forecolor backcolor emoticons",
      image_advtab: true,
      templates: [
         {title: 'Test template 1', content: 'Test 1'},
         {title: 'Test template 2', content: 'Test 2'}
      ],
      image_title: true,
      convert_urls: false,
      content_css: "css/content.css"
   });
</script>
<!-- Footer -->

@endsection