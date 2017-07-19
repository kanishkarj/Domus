@extends('layouts.master') @section('content')
<div class="w3-content w3-display-container">
  @foreach($post->images as $image)
  <div class="mySlides">
    <img class="img" src="{{$image->path}}">
  </div>
  @endforeach
  <div class="w3-center w3-display-bottommiddle" style="width:100%">
    <div class="w3-left arrows" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right arrows" onclick="plusDivs(1)">&#10095;</div>
    @php($count = 1) @foreach($post->images as $image)
    <span class="w3-badge demo custom-border w3-transparent w3-hover-white" onclick="currentDiv({{$count}})"></span> @php($count++)
    @endforeach
    <br> @foreach($post->images as $image)
    <span class="caption">{{$image->caption}}</span> @endforeach
  </div>
</div>
<div class="content">
  <h1>{{$post->title}}</h1>
  <h3>{{$post->subtitle}}</h3>
  <h6> - {{$post->user->name}}</h6>
  <section>
  {!! $post->content !!}
  </section>
  <ul id="tagList">
  @foreach($post->tags as $tag)
    <li><a href="#">{{$tag->name}}</a></li>
  @endforeach
  </ul>
</div>
@endsection @section('script')
<link rel="stylesheet" href="/css/showPosts.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    var v = document.getElementsByClassName("caption");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
      v[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" w3-white", "");
    }
    x[slideIndex - 1].style.display = "block";
    v[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " w3-white";
  }
</script>


@endsection