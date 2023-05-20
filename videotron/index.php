<?php
  include_once("config.php");
  
  // Fetch all users data from database
  $result = mysqli_query($mysqli, "SELECT * from card");

  // $user_data = mysqli_fetch_array($result)
?>

<!DOCTYPE html>
<html>
<head>
<title>WELCOME</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>

@media screen and (min-width: 800px) {
  header {
    margin-top:150px;
  }
}


body, html {
  height: auto;
  background-color: #333;
}


#myVideo {
  right: 0;
  bottom: 0;
  width: 100%;
  /* min-width: 100%; */
  /* min-height: 100%; */
}

.video-container {
  height: auto;
  width: 100%;
}

.hdr{
  /* position: fixed; */
  /* bottom: 0; */
  /* background: rgba(0, 0, 0, 0.5); */
  /* color: #f1f1f1; */
  width: auto;
  padding: 20px;

  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  min-height: 100%;
  background-position: center;
  background-size: cover;
}


.bgimg {
  background-image: url('Dülmen,_Umland,_Sonnenaufgang_--_2012_--_8069.webp');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  text-align:  center;
}

li {
  float: left;
  text-align:  center;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}

.center ul{
  width: -moz-fit-content;
  width: -webkit-fit-content;
  width: fit-content;
  margin:auto;
}
.navbar{
  width:100%;
  background-color: #333
}



/* pop up */
.box {
  background-color: black;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  }
  p {
  font-size: 17px;
  align-items: center;
  }
  .box a {
  display: inline-block;
  background-color: #fff;
  padding: 15px;
  border-radius: 3px;
  }

  .modal {
  height: 100%;
  width: 100%;
  align-items: center;
  display: flex;
  justify-content: center; 
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(254, 126, 126, 0.7);
  transition: all 0.4s;
  visibility: hidden;
  opacity: 0;
  z-index: 1;
  padding: 10px;
  }

  .content {
  position: absolute;
  background: white;
  width: 400px;
  padding: 1em 2em;
  border-radius: 4px;
  } 
  .modal:target {
  visibility: visible;
  opacity: 1;
  }
  .box-close {
  position: absolute;
  top: 0;
  right: 15px;
  color: #fe0606;
  text-decoration: none;
  font-size: 30px;
  }
  .w3-container{
    background-color:white;
  }

  .card-link{
    width:100%;
    background-image: url('1.webp');
    
    height: 100px;
  }

  .cont {
    position: relative;
    width: 50%;
  }

  .image {
    display: block;
    width: 100%;
    height: auto;
  }

  .overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 1;
    transition: .5s ease;
    
  }


  .text {
    color: white;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
  }


  .im{
    /* height: 200px;
    background-image:url('1.webp'); */
    border-radius: 10%;
    position: relative;
    background-color: blue;
    z-index: 0;
  }
  .im h1{
    position: absolute;
    margin: auto;
    color: white;
    font-size: 20px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
  }
  
  
</style>
</head>
<body>

<div class="video-container">
  <div class="w3-display-topmiddle w3-text-white w3-center">
    <h1 class="w3-jumbo">WELCOME</h1>
    <h2>Coming Soon</h2>
    <h2><b>5 days until deployment</b></h2>
  </div>
  <video autoplay muted loop id="myVideo"><source src="video/vid.mp4" type="video/mp4"></video>
</div>

<!-- <header class="w3-display-container w3-wide w3-grayscale-min hdr" id="home"></header> -->

<div class="navbar center">
  <ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="#popup-box">About</a></li>
    <li><a href="animation.php">Animation</a></li>
    <li><a href="image.php">Image</a></li>
    <li><a href="pdf/Example.pdf">Article</a></li>
  </ul>
</div>


<div id="popup-box" class="modal">
  <div class="content">
      <h1 style="color: green;">
          About
      </h1>
      <b>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus vitae cupiditate excepturi, perspiciatis accusantium nesciunt voluptatem quae ullam hic, perferendis magnam? Itaque odio laborum quae incidunt voluptatibus explicabo asperiores beatae.</p>
      </b>
      <a href="#" 
         class="box-close">
          ×
      </a>
  </div>
</div>


<div class="w3-container" id="about">
  <div class="w3-row-padding w3-padding-16 w3-center">
    
      <div class="w3-quarter">
        <a href="#popup-box">
      
        <div class="im">
          <img src="3.webp" alt="Landscape 3" style="width:100%">
          <h1>About</h1>
        </div>
        
        
        </a>
      </div>
   
    <div class="w3-quarter">
      <img src="2.webp" alt="Landscape 2" style="width:100%">
      <h4>Александр Байдуков/Wikimedia Commons/”Lake_Seliger ._Ostashkov. _View_of_Voroniy_Island .webp”/ CC BY-SA 4.0</h4>
      <p>English: Seliger: Ostashkovsky district, Tver region</p>
    </div>
    <div class="w3-quarter">
      <img src="3.webp" alt="Landscape 3" style="width:100%">
      <h4>Dietmar Rabich / Wikimedia Commons / “Nordkirchen, Naturschutzgebiet Ichterloh -- 2018 -- 2131-7” / CC BY-SA 4.0
</h4>
      <p>English: Trees and other plants on the edge of the Nature reserve Ichterloh, Nordkirchen at sunrise, North Rhine-Westphalia, Germany</p>
    </div>
    <div class="w3-quarter">
      <img src="4.webp" alt="Landscape 4" style="width:100%">
      <h4>Dietmar Rabich / Wikimedia Commons / “Dülmen, Börnste, Waldweg -- 2015 -- 4649” / CC BY-SA 4.0
</h4>
      <p>English: Autumn in the Börnste hamlet, Kirchspiel, Dülmen, North Rhine-Westphalia, Germany</p>
    </div>
  </div>
</div>

</body>
</html>
