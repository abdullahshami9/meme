<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/trending.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Optional JavaScript > -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</head>
<body>

<div class="wholeview">


<?php 
  include("../header/header.php");
 ?>



<center>
<section>
  <div id="demo" class="carousel slide " style="background: teal;
bckground: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(103,121,9,1) 35%, rgba(0,212,255,1) 100%);" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1" ></li>
    <li data-target="#demo" data-slide-to="2" ></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/img1.jpg" alt="Los Angeles" style="clip-path: polygon(88% 28%, 77% 14%, 90% 50%, 84% 75%, 80% 91%, 55% 2%, 98% 52%, 3% 50%, 2% 41%, 4% 61%, 5% 74%, 9% 38%, 26% 22%, 30% 78%, 33% 24%);">
    </div>
    <div class="carousel-item">
      <img src="images/img1.jpg" alt="Chicago" style="clip-path: polygon(54% 11%, 67% 18%, 79% 31%, 84% 42%, 84% 57%, 75% 76%, 59% 62%, 71% 48%, 39% 41%, 8% 84%, 43% 74%, 15% 19%, 55% 84%, 65% 88%, 35% 18%, 81% 98%, 82% 99%, 82% 99%);">
    </div>
    <div class="carousel-item">
      <img src="images/img1.jpg" alt="New York" style="-webkit-clip-path: polygon(20% 0%, 0% 20%, 30% 50%, 0% 80%, 20% 100%, 50% 63%, 80% 100%, 100% 80%, 70% 50%, 100% 20%, 80% 0%, 50% 30%);clip-path: polygon(20% 0%, 0% 20%, 30% 50%, 0% 80%, 20% 100%, 50% 63%, 80% 100%, 100% 80%, 70% 50%, 100% 20%, 80% 0%, 50% 30%);">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
</section>
</center>


<br>
<center>
  <hr style="border:0.5px solid magenta;width:70%;">
</center>
<br>



<!-- 	<header>
  <h1>Data of trending according to the stats</h1>
  <p>Comes with a Sass @mixin so that you can quickly modify the number of columns and items.</p>
  <p>Also, you can <strong>resize</strong> the window. It keeps working when grid changes.</p>
</header> -->
  <ul class="grid">
    <li>
      <a href="#">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/wvfrkayr0mg-christelle-bourgeois-776x1063.jpg" alt="">
        <span class="description">Dearest Diary</span>
      </a>
    </li>
    <li>
      <a href="#">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/fbanijhrol4-annie-spratt-776x951.jpg" alt="">
      </a>
      <span class="description">Window Sill?</span>
    </li>
    <li>
      <a href="#">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/2rm8p0rkxiw-marius-masalar-776x582.jpg" alt="">
        <span class="description">Listen To Me</span>
      </a>      
    </li>
    <li>
     <a href="#">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/71nlan-2ya-andrew-neel-2-776x620.jpg" alt="">
        <span class="description">Travel Often</span>
      </a>
    </li>
    <li>
      <a href="#">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/hdyo6rr3kqk-scott-webb-1172x780.jpg" alt="">
        <span class="description">Another Plant?</span>
      </a>
    </li>
    <li>
      <a href="#">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/fvazbu6zae-andrew-neel-776x517.jpg" alt="">
        <span class="description">On the Wave</span>
      </a>
    </li>
    <li>
      <a href="#">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/typewriter-1-776x968.jpg" alt="">
        <span class="description">Great Gatsby</span>
      </a>
    </li>    
    <li>
      <a href="#">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/xohlruw4k8-christelle-bourgeois-776x758.jpg" alt="">
        <span class="description">In the Sun</span>
      </a>
    </li>
</ul>
</div>
</div>
</body>
</html>