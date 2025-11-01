<?php
include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop Categories</title>

   <!-- Font Awesome CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/style.css">
<style>
    /* |---------------------------------------------------------
    | shop-category specific styling 
    |---------------------------------------------------------
    | This overrides any generic .box or .box-container styling 
    | applied globally for the category boxes only.
    */
    .shop-category {
        padding: 2rem;
    }

    .shop-category .title {
        text-align: center;
        font-size: 3rem;
        margin-bottom: 2rem;
        text-transform: uppercase;
        color: #333;
    }

    .shop-category .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        justify-content: center;
        align-items: flex-start;
    }

    .shop-category .box {
        background: #fff;
        padding: 1.5rem;
        border-radius: 0.5rem;
        text-align: center;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        
        /* Ensure specific box styles are applied here, not relying on global .box */
        border: .1rem solid var(--black); /* Re-adding border from global var */
    }

    .shop-category .box img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 0.5rem;
    }

    .shop-category .box h3 {
        margin: 1rem 0;
        font-size: 1.8rem;
        color: #222;
        text-transform: capitalize;
    }

    .shop-category .box .btn {
        /* Overrides generic .btn to fit within the category box */
        display: block; 
        width: 100%;
        margin-top: 0.5rem;
        padding: 0.8rem 2rem;
        font-size: 1.4rem;
        color: #fff;
        background: #27ae60;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: 0.3s ease;
    }

    .shop-category .box .btn:hover {
        background: #219150;
    }
</style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="heading">
   <h3>Shop Categories</h3>
   <p><a href="home.php">Home</a> / Categories</p>
</div>

<section class="shop-category">
   <h1 class="title">Browse by Category</h1>
   <div class="grid-container">

      <!-- Example Category -->
      <div class="box">
         <img src="images/cat5.webp" alt="Cat">
         <h3>Cat</h3>
         <a href="category.php?category=cat" class="btn"> Cat</a>
      </div>

      <div class="box">
         <img src="images/dog.avif" alt="Dog">
         <h3>Dog</h3>
         <a href="category.php?category=dog" class="btn"> Dog</a>
      </div>

      <div class="box"> 
         <img src="images/hen1.jpg" alt=""> 
         <h3>Hen</h3> 
         <a href="category.php?category=hen" class="btn">hen</a> 
      </div>

       <div class="box"> 
         <img src="images/wood.jpg" alt=""> 
         <h3>Duck</h3> 
         <a href="category.php?category=hen" class="btn">duck</a> 
      </div>

      <div class="box"> 
         <img src="images/r4.jpg" alt=""> 
         <h3>Rabbit</h3> 
         <a href="category.php?category=rabbit" class="btn">rabbit</a> 
      </div>

      <div class="box"> 
         <img src="images/hamster1.webp" alt=""> 
         <h3>Hamster</h3> 
         <a href="category.php?category=hamster" class="btn">hamster</a> 
      </div>

      
      

      <div class="box">
         <img src="images/bird.jpg" alt="Bird">
         <h3>Bird</h3>
         <a href="category.php?category=bird" class="btn">Bird</a>
      </div>

       <div class="box"> 
         <img src="images/pig.webp" alt=""> 
         <h3>Ginuea Pig</h3> 
         <a href="category.php?category=pig" class="btn">ginuea pig</a> 
      </div>

      <div class="box"> 
         <img src="images/g2.jpg" alt=""> 
         <h3>Gerbil</h3> 
         <a href="category.php?category=gerbil" class="btn">gerbil</a> 
      </div>

      <div class="box"> 
         <img src="images/chinchilla.jpg" alt=""> 
         <h3>Chinchilla</h3> 
         <a href="category.php?category=chinchilla" class="btn">chinchilla</a> 
      </div>

      <div class="box"> 
         <img src="images/cf.webp" alt=""> 
         <h3>Cat Food</h3> 
         <a href="category.php?category=cat_food" class="btn">View cat food</a> 
      </div>

      <div class="box"> 
         <img src="images/ca.jpeg" alt=""> 
         <h3>Cat Accessories</h3> <a href="category.php?category=cat_accessories" class="btn">cat accessories</a> 
      </div>

      <div class="box"> 
         <img src="images/df.webp" alt=""> 
         <h3>Dog Food</h3> 
         <a href="category.php?category=dog_food" class="btn">View dog food</a> 
      </div>

      <div class="box"> 
         <img src="images/doa.webp" alt=""> 
         <h3>Dog Accessories</h3> 
         <a href="category.php?category=dog_accessories" class="btn">View dog accessories</a> 
      </div>

      <div class="box"> 
         <img src="images/ha.webp" alt=""> 
         <h3>Hen Accessories</h3> 
         <a href="category.php?category=hen_accessories" class="btn">View hen accessories</a> 
      </div>

      <div class="box"> 
         <img src="images/dua.webp" alt=""> 
         <h3>Duck Accessories</h3> 
         <a href="category.php?category=duck_accessories" class="btn">View duck accessories</a> 
      </div>

      <div class="box"> 
         <img src="images/ra.jpg" alt=""> 
         <h3>Rabbit Food</h3> 
         <a href="category.php?category=rabbit_food" class="btn">View rabbit food</a> 
      </div> 


      <div class="box"> 
         <img src="images/ra2.jpg" alt=""> 
         <h3>Rabbit Accessories</h3> 
         <a href="category.php?category=rabbit_accessories" class="btn">View rabbit accessories</a> 
      </div>

      <div class="box"> 
         <img src="images/hf.jpg" alt=""> 
         <h3>Hamster Food</h3> 
         <a href="category.php?category=hamster_food" class="btn">View hamster food</a> 
      </div> 
      
      <div class="box"> 
         <img src="images/ha3.jpg" alt=""> 
         <h3>Hamster Accessories</h3> 
         <a href="category.php?category=hamster_accessories" class="btn">View hamster accessories</a> 
      </div>

      <div class="box"> 
         <img src="images/bf.webp" alt=""> 
         <h3>Bird Food</h3> 
         <a href="category.php?category=bird_food" class="btn">View bird food</a> 
      </div> 
      
      <div class="box"> 
         <img src="images/ba.jpg" alt=""> 
         <h3>Bird Accessories</h3> 
         <a href="category.php?category=bird_accessories" class="btn">View bird accessories</a> 
      </div> 
      
      <div class="box"> 
         <img src="images/gf.webp" alt=""> 
         <h3>Ginuea Pig Food</h3> 
         <a href="category.php?category=pig_food" class="btn">View Ginuea Pig Food</a> 
      </div>

      <div class="box"> 
         <img src="images/ga.jpg" alt=""> 
         <h3>Ginuea Pig Accessories</h3> 
         <a href="category.php?category=pig_accessories" class="btn">View Ginuea Pig Accessories</a> 
      </div> 
      
      <div class="box"> 
         <img src="images/gef.jpg" alt=""> 
         <h3>Gerbil Food</h3> 
         <a href="category.php?category=gerbil_food" class="btn">View Gerbil Food</a> 
      </div> 
      
      <div class="box"> 
         <img src="images/gea.jpg" alt=""> 
         <h3>Gerbil Accessories</h3> 
         <a href="category.php?category=gerbil_accessories" class="btn">View Gerbil Accessories</a> 
      </div>

      <div class="box"> 
         <img src="images/chf.jpg" alt=""> 
         <h3>Chinchilla Food</h3> 
         <a href="category.php?category=chinchilla_food" class="btn">View Chinchilla Food</a> 
      </div> 
      
      <div class="box"> 
         <img src="images/cha.jpg" alt=""> 
         <h3>Chinchilla Accessories</h3> 
         <a href="category.php?category=chinchilla_accessories" class="btn">View Chinchilla Accessories</a> 
      </div> 
      
      <div class="box"> 
         <img src="images/cm.webp" alt=""> 
         <h3>Cat Medicine</h3> 
         <a href="category.php?category=cat_medicine" class="btn">View Cat Medicine</a> 
      </div>

      <div class="box"> 
         <img src="images/dm.jpg" alt=""> 
         <h3>Dog Medicine</h3> 
         <a href="category.php?category=dog_medicine" class="btn">View Dog Medicine</a> 
      </div> 
      
      <div class="box"> 
         <img src="images/bm.jpg" alt=""> 
         <h3>Bird Medicine</h3> 
         <a href="category.php?category=bird_medicine" class="btn">View Bird Medicine</a> 
      </div> 
      
      <div class="box"> 
         <img src="images/grooming.jpg" alt=""> 
         <h3>Pet Grooming</h3> 
         <a href="category.php?category=pet_grooming" class="btn">Pet Grooming</a> 
      </div>

      <div class="box"> 
         <img src="images/event.webp" alt=""> 
         <h3>Pet Event Celebration</h3> 
         <a href="category.php?category=event_management" class="btn">Event Management</a> 
      </div>

 




   

      <!-- Add more boxes as needed -->

   </div>
</section>

<script src="js/script.js"></script>
</body>
</html>
