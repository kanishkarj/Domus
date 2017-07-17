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
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload(this);" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                        </div>
                    </div>
                </div>
            </li>
       </ul>
    </div>

    <footer class="w3-container w3-teal">
      <p>Domus</p>
    </footer>

  </div>
</div> 
<div id="createPost">
        <form id="postForm" class="form-horizontal" method="POST" action="/posts/store" enctype="multipart/form-data">
                            {{ csrf_field() }}
            <link rel="stylesheet" href="/css/forms.css">
            <input type="text" placeholder="Title" id="title" id="title">
            <hr>
            <input type="text" placeholder="Subtitle" id="subtitle" id="subtitle">
            <input type="text" placeholder="Enter your tags here seperated by coma ..." id="tags" id="tags">
            <textarea placeholder="Enter Content Here..." name="content" id="content" cols="30" rows="20"></textarea>
            <div id="HiddenInputs" style="display:none;">

            </div>
        </form>

    </div>
</div>
    
@endsection
@section('script')  
    <link rel="stylesheet" href="/css/forms.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
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
        $(element).attr('name','img' + imgid.toString());
        imgid++;
        $('#postForm').append($(element).clone());
    });
    $('#postForm').submit();
}
    </script>
@endsection