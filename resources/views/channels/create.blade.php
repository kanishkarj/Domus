@extends('layouts.master')

@section('content')
<div class="container">
   <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form  id="RegistrationForm" class="form-horizontal" method="POST" action="/channels/store" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('caption') ? ' has-error' : '' }}">
                            <label for="caption" class="col-md-4 control-label">Caption</label>

                            <div class="col-md-6">
                                <input id="caption" type="caption" class="form-control" name="caption" value="{{ old('caption') }}" required>

                                @if ($errors->has('caption'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('caption') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">avatar</label>
                            <div class="col-md-6">
                           
                                <input type="file" class="" name="avatar" id="avatar">
                                <img id="avatar_display" class="img-circle" src="" alt="">
                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Channel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="/js/app.js"></script>

        <script>
        $(document).on("change",'#avatar' ,function(e) {
                    var img = $("#avatar_display");
                     img.attr('src',URL.createObjectURL(e.target.files[0]));
        });
</script>
<style>

#avatar_display{
    height:10em;
    width:10em;
    margin: 1em;
    object-fit: cover;
}

</style>
@endsection

<!--
for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

                    var file = e.originalEvent.srcElement.files[i];

                    var img = $("#avatar_display");
                    var reader = new FileReader();
                    reader.onloadend = function() {
                        img.src = reader.result;
                    }
                    reader.readAsDataURL(file);
                    
                }