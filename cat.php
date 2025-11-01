<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};
?>

<!DOCTYPE html>
<html lang="en">

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

<style>
    body {
      font-family: Arial, sans-serif;
      background-color:  #B5DCB7;
      text-align: center;
      padding: 50px;
      font-size: 1.5rem;
    }

    .fancy-image {
      width: 300px;
      background-size: cover;
      background-position: center;
    }

    .fancy-image:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
    }

    h1 {
      color: #333;
    }
  </style>
</head>
<body>

  <img src="images/p42.webp" alt="Styled Example" class="fancy-image">
  <p>
    <b>Calathea plant care</b> <br><br>

  <b> Soil:</b><br>
<b>Ideal Mix:</b> A well-draining potting mix, ideally with peat moss, compost, pine bark, coco coir, worm castings, 
and perlite, provides the necessary structure and nutrients. <br>
<b>Avoid:</b> Wet soil or dry, sandy soil, as calatheas are prone to root rot and may not tolerate excessive dryness. <br>
<b>pH:</b> They prefer a slightly acidic to neutral pH. <br>
<b>Light:</b><br>
<b>Ideal: </b>Calatheas prefer bright, but indirect sunlight. Filtered light is best to mimic their natural forest environment. <br>
<b>Avoid:</b> Direct sunlight, which can burn their leaves. <br>
<b>Signs of Too Much Light: </b> leaves start to fade or show signs of damage, move the plant to a more shaded location.<br> 
<b>Watering:</b><br>
<b>Frequency:</b>
Keep the soil consistently moist, but not soggy. Water when the top inch or two of the soil feels dry. <br>
<b>Overwatering:</b><br>
Calatheas are susceptible to root rot if overwatered. Avoid letting the pot sit in water and ensure proper drainage. <br>
<b>Tap Water:</b><br>
Avoid using tap water, as it may contain chlorine and other chemicals that can harm the plant. Use filtered water or rainwater instead. <br>
<b>Humidity:</b><br>
<b>Essential:</b> Calatheas thrive in humid environments.<br>
<b>Methods to Increase Humidity:</b> Misting the leaves regularly, placing the plant on a pebble tray with water, or using a humidifier can help create a more humid environment. <br>
<b>Temperature:</b><br>
<b>Ideal Range:</b> Calatheas prefer temperatures between 65-80°F (18-27°C). <br>
<b>Avoid:</b> Strong drafts and cold temperatures. <br>
<b>Fertilizing:</b><br>
<b>Frequency:</b> Fertilize every 2-4 weeks during the growing season (spring to autumn) with a balanced, diluted houseplant fertilizer. <br>
<b>Dormancy:</b> Reduce fertilization during the winter months. <br>
<b>Repotting:</b><br>
<b>Timing:</b>
Repot every year or every other year during spring or summer, if the plant is growing well. <br>
<b>New Pot:</b>
Choose a pot that is only slightly larger than the current one to avoid root rot. <br>
<b>Propagation:</b>
<b>By Division:</b> Large calatheas can be easily propagated by dividing them during repotting.<br> 
<b>Other Tips:</b><br>
<b>Temperature:</b> Keep Calatheas away from drafts and cold air. <br>
<b>Ventilation:</b> Ensure reasonable ventilation, but avoid strong drafts. <br>
<b>Pests:</b> Watch out for pests like red spider mites, which can affect calatheas. <br>
  
  </p>
</body>
</html>


