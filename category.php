<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
};

// --- Add to Cart Logic ---
if(isset($_POST['add_to_cart'])){
     
    $pid = $_POST['pid'];
    $pid = filter_var($pid, FILTER_SANITIZE_STRING);
    $p_name = $_POST['p_name'];
    $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
    $p_price = $_POST['p_price'];
    $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
    $p_image = $_POST['p_image'];
    $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
    $p_qty = $_POST['p_qty'];
    $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

    $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
    $check_cart_numbers->execute([$p_name, $user_id]);
    $check_cart_result = $check_cart_numbers->get_result();

    if($check_cart_result->num_rows > 0){
        $message[] = 'already added to cart!';
    }else{
        $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
        $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
        $message[] = 'added to cart!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* CSS Variables: Keep these if your style.css link is broken or incomplete */
        :root {
            --white: #fff;
            --black: #333;
            --light-color: #666;
            --light-bg: #eee;
            --border: .1rem solid var(--black);
            --box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
            --purple: #8e44ad; 
            --orange: orange; 
            --green: green; 
        }
        
        .products .box-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr)) !important; 
            align-items: flex-start;
            gap: 1.5rem;
            justify-content: center;
        }

        .products .box-container .box {
            border-radius: .5rem !important;
            background-color: var(--white) !important;
            box-shadow: var(--box-shadow) !important;
            padding: 2rem !important;
            text-align: center !important;
            border: var(--border) !important;
            position: relative !important;
            max-width: 32rem; 
            margin: 0 auto; 
        }

        .products .box-container .box img {
            height: 20rem !important; 
            width: 100% !important; 
            object-fit: cover !important; 
            border-radius: .5rem !important; 
            margin-bottom: 1rem !important;
        }
        
        .products .box-container .box .qty {
            width: 100% !important;
            padding: 1rem !important;
            margin: 1rem 0 !important;
            border: var(--border) !important;
        }

        .products .box-container .box .btn { 
            width: 100% !important;
            display: block !important;
            margin-top: 1rem !important;
            padding: 1rem 2rem !important;
            font-size: 1.8rem !important;
            border-radius: .5rem !important;
            cursor: pointer !important;
            text-transform: capitalize !important;
            text-align: center !important;
            background-color: var(--purple) !important; 
            color: var(--white) !important;
        }

        
        .products .box-container .box .price {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background-color: var(--purple);
            color: var(--white);
            font-size: 2rem;
            padding: .5rem 1rem;
            border-radius: .5rem;
        }
        
        /* 🎨 NEW: Details style to keep it tidy in the box */
        .products .box-container .box .details {
            font-size: 1.4rem;
            color: var(--light-color);
            padding: 0 0 1rem 0;
            text-align: center;
            /* Limit height to prevent large descriptions from breaking the layout */
            max-height: 4.2rem; 
            overflow: hidden;
            line-height: 1.4;
        }

    </style>
</head>
<body>
    
<?php include 'header.php'; ?>
<?php // include 'message.php'; ?>

<section class="products">

    <h1 class="title">products categories</h1>

    <div class="box-container">

    <?php
    // --- DATABASE FETCH ---
    
    $category_name = $_GET['category'] ?? ''; 
    // SELECT query-তে 'details' কলামটি অবশ্যই আছে ধরে নেওয়া হলো
    $select_products = $conn->prepare("SELECT * FROM `products` WHERE `category` = ?");
    $select_products->execute([$category_name]);
    $result = $select_products->get_result(); 

    if ($result->num_rows > 0) {
        while ($fetch_products = $result->fetch_assoc()) {
    ?>
    
    <form action="" class="box" method="POST">
      
      <div class="price">৳<span><?= $fetch_products['price']; ?></span>/-</div>
      
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      
      <div class="details">
          <?= $fetch_products['details']; ?>
      </div>
      
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
    </form>

    <?php
        }
    } else {
        echo '<p class="empty">no products available!</p>';
    }
    ?>

    </div>

</section>


<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>