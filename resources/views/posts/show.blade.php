@extends('layouts.master') @section('content')
<div class="w3-content">
  @foreach($post->images as $image)
  <div class="mySlides">
    <img src="{{$image->path}}" id="imageBG">
    <img src="{{$image->path}}" id="imageFG">
    <h3>{{$image->caption}}</h3>
  </div>
   @endforeach
</div>

<div class="w3-center">

  @php ($count = 1) @foreach($post->images as $image)
  <button class="w3-button demo" onclick="currentDiv({{$count}})"></button> @php ($count++) @endforeach

</div>
@endsection @section('script')
<link rel="stylesheet" href="/css/showPosts.css">
<script>
  var slideIndex = 1;
  showDivs(slideIndex);

  function plusDivs(n) {
    showDivs(slideIndex += n);
  }

  function currentDiv(n) {
    showDivs(slideIndex = n);
  }

  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" w3-red", "");
    }
    x[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " w3-red";
  }
</script>


@endsection