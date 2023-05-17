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
body, html {
    height: 100%;
}


#myVideo {
  
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}


.hdr{
  /* position: fixed; */
  /* bottom: 0; */
  /* background: rgba(0, 0, 0, 0.5); */
  /* color: #f1f1f1; */
  width: 100%;
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
  background-image: url('Dülmen,_Umland,_Sonnenaufgang_--_2012_--_8069.jpg');
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
  align-items: center;
  display: flex;
  justify-content: center; 
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(254, 126, 126, 0.7);
  transition: all 0.4s;
  visibility: hidden;
  opacity: 0;
  }
  .content {
  position: absolute;
  background: white;
  width: 50%;
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
</style>
</head>
<body>



<div class="navbar center">
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="#popup-box">About</a></li>
    <li><a href="animation.php">Animation</a></li>
    <li><a class="active" href="image.php">Image</a></li>
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
    <?php while($user_data= mysqli_fetch_array($result)) :?>
    <div class="w3-quarter">
        
        <a href=<?php echo ("#popup-img".$user_data['id'])?>><img src=<?php echo ("img/".$user_data['img'])?> alt="Landscape 1" style="width:100%"></a>
        <h4><?php echo $user_data['nama']?></h4>
        <p><?php echo $user_data['keterangan']?></p>
    </div>
    <div id=<?php echo ("popup-img".$user_data['id'])?> class="modal">
        <div class="content">
            <h1 style="color: green;">
                <?php echo $user_data['nama']?>
            </h1>
            <img src=<?php echo ("img/".$user_data['img'])?> alt="" width="500" >
            <a href="#" 
                class="box-close">
                ×
            </a>
        </div>
    </div>
    <?php endwhile; ?>
    
  </div>
</div>

</body>
</html>
