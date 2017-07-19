@extends('layouts.master')

@section('content')
<div>
<div class="icon-bar">
  <a href="#" onclick="submitPost()"><i class="fa fa-upload"></i></a>
  <a href="#"><i class="fa fa-tags"></i></a>
  <a href="#" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-picture-o"></i></a>
  <a href="#"><i class="fa fa-trash"></i></a>
</div>

 <div id="id01" class="w3-modal">
  <div class="w3-modal-content">

    <header class="w3-container w3-teal">
      <span onclick="document.getElementById('id01').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
      <h2>Choose Images</h2>
    </header>

    <div class="w3-container">
       <ul id="imageList">
            <li>
                <div class="file-upload">
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                        <div class="drag-text">
                        <h4>Drag and drop a file or select add Image</h4>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <img class="file-upload-image img-responsive" src="#" alt="your image" />
                        <textarea class="ImageCaption" placeholder="Enter Image caption here..."></textarea>
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload(this);" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                        </div>
                    </div>
                    
                </div>
            </li>
       </ul>
    </div>

  </div>
</div> 
<div id="createPost">
         @if(isset($post))
            <form id="postForm" class="form-horizontal" method="POST" action="/posts/patch/{{$post->slug}}" enctype="multipart/form-data">
         @else
            <form id="postForm" class="form-horizontal" method="POST" action="/posts/store" enctype="multipart/form-data">
        @endif     
                            {{ csrf_field() }}
            
             @if(isset($post))
             <input type="text" placeholder="Title" id="title" name="title" value="{{$post->title}}">
             @else
             <input type="text" placeholder="Title" id="title" name="title" >
             @endif
            
            <hr>
             @if(isset($post))
             <input type="text" placeholder="Subtitle" id="subtitle" name="subtitle" value="{{$post->subtitle}}">
             @else
             <input type="text" placeholder="Subtitle" id="subtitle" name="subtitle" >
             @endif
            
            @php
            $tags="";
            foreach($post->tags as $tag){
                $tags = $tags .','.$tag->name;
            }
            $tags = substr($tags, 1);
            @endphp

             @if(isset($post))
             <input type="text" placeholder="Enter your tags here seperated by comma ..." id="tags" name="tags" value="{{$tags}}">
             @else
             <input type="text" placeholder="Enter your tags here seperated by comma ..." id="tags" name="tags">
             @endif
            
             @if(isset($post))
             <textarea placeholder="Enter Content Here..." name="content" id="content" cols="30" rows="20">{{$post->content}}</textarea>
             @else
             <textarea placeholder="Enter Content Here..." name="content" id="content" cols="30" rows="20"></textarea>
             @endif
            
            
        </form>

    </div>
</div>
    
@endsection
@section('script')  
    <link rel="stylesheet" href="/css/forms.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 

    @if(isset($post))
    <script>
        alert("Due to security reasons, you will have to upload the images again. Sorry for the inconvenience.");
    </script>
    @endif

    <script>
$('#postForm').submit(function(){
    alert('hello')
});
       function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $(input).parents().eq(2).find('.image-upload-wrap').hide();

      $(input).parents().eq(2).find('.file-upload-image').attr('src', e.target.result);
      $(input).parents().eq(2).find('.file-upload-content').show();

      $(input).parents().eq(2).find('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload($(input).parents().eq(2).find('.remove-image'));
  }
  addImageElement()
}

function removeUpload(el) {
  $(el).parents().eq(3).find('.file-upload-input').replaceWith($(el).parents().eq(3).find('.file-upload-input').clone());
  $(el).parents().eq(3).find('.file-upload-content').hide();
  $(el).parents().eq(3).find('.image-upload-wrap').show();
  $(el).parents().eq(3).find('input').val(null);
    $(el).parents().eq(3).find('textarea').val(null);
}
    $('.image-upload-wrap').bind('dragover', function () {
		    $('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		    $('.image-upload-wrap').removeClass('image-dropping');
    });
function addImageElement(){
    $("#imageList").append(
        '    <li>\
                <div class="file-upload">\
                    <div class="image-upload-wrap">\
                        <input class="file-upload-input" type="file" onchange="readURL(this);" accept="image/*" />\
                        <div class="drag-text">\
                        <h4>Drag and drop a file or select add Image</h4>\
                        </div>\
                    </div>\
                    <div class="file-upload-content">\
                        <img class="file-upload-image img-responsive" src="#" alt="your image" />\
                        <textarea class="ImageCaption" placeholder="Enter Image caption here..."></textarea>\
                        <div class="image-title-wrap">\
                            <button type="button" onclick="removeUpload(this)" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>\
                        </div>\
                    </div>\
                </div>\
            </li>\
        '
    );
}

function submitPost(){
    var imgid=1;
    $("#imageList").find('input').toArray().forEach(function(element) {
        if($(element).val()){
            $(element).attr('name','img' + imgid.toString());
            $(element).parents().eq(2).find('textarea').attr('name','caption' + imgid.toString());
            imgid++;
            $('#postForm').append($(element).clone());
            $('#postForm').append($(element).parents().eq(2).find('textarea').clone());
        }});
    
    $('#postForm').submit();
}
    </script>
@endsection