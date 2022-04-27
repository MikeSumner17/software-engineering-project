<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MyGymManager</title>
        <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
        <script defer src="main.js"></script>
    </head>    
    
    <body>
        <div class="topnav">
            <a class="topnav-left" href="../add_member/addmember.php">Add Member</a>
            <a class="topnav-left" href="../search/search.php">Search</a>
            <a class="topnav-left" href="../plans/plans.html">Plans</a>
            <a class="topnav-right" href="logout.php">Log Out</a>
        </div> 

    <!--    If you are adding a calendar.. remove the code between these brackets!      -->

    <style>
    * {box-sizing: border-box}
    body {
        font-family: Verdana, sans-serif; 
        margin: 0px;
    }
    .mySlides {
        display: none
    }
    img {
        vertical-align: middle;
    }

    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    .prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
    }

    .text {
        color: #f2f2f2;
        background-color: black;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    .numbertext {
        color: #f2f2f2;
        background-color: black;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
        background-color: #717171;
    }

    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
    }

    @media only screen and (max-width: 300px) {
        .prev, .next,.text {
            font-size: 11px
        }
    }
</style>

</head>
<body>

<div class="slideshow-container">

<div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="GymSmile.jpeg" style="width:100%">
    <div class="text">Remember to Smile!</div>
</div>

<div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="GymStaff.jpg" style="width:100%">
    <div class="text">Teamwork makes the dream work</div>
</div>

<div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="GymSafety.jpg" style="width:100%">
    <div class="text">Always Practice Safety</div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<!--    If you are adding a calendar.. remove the code between these brackets!      -->
    </body>
</html>
