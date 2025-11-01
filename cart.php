<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
}
if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'cart quantity updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

    <style>
        :root {
            --white: #fff;
            --black: #333;
            --light-color: #666;
            --border: .1rem solid var(--black);
            --box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
            --purple: #8e44ad;
            --orange: orange;
            --red: #c0392b; 
        }
        
        .shopping-cart .box-container .box img{
            height: 15rem !important; 
            width: 100% !important; 
            object-fit: cover !important; 
            margin: 0 auto 1rem !important;
            border-radius: .3rem;
            display: block;
        }

        .shopping-cart .box-container .box .fa-times{
            height: 4.5rem; 
            width: 4.5rem; 
            line-height: 4.5rem;
            font-size: 2rem; 
            border-radius: .5rem; 
            background-color: var(--red) !important; 
            color: var(--white) !important;
        }

        .shopping-cart .box-container .box .option-btn {
            background-color: var(--orange);
            color: var(--white);
            padding: 1.2rem 1.4rem;
            font-size: 2rem;
            border-radius: .5rem;
            width: 100%; 
            margin-top: 1rem;
        }

        .shopping-cart .box-container .box input[type="number"]{
            width: 9rem; 
        }
        
        .delete-btn, .shopping-cart .cart-total .flex a{
            padding: 1.2rem 2rem;
            font-size: 2rem;
            border-radius: .5rem;
            text-decoration: none;
        }
        .delete-btn {
            background-color: var(--red);
            color: var(--white);
            display: inline-block;
        }
        .shopping-cart .cart-total .flex .option-btn{ /* Continue Shopping */
            background-color: var(--orange);
            color: var(--white);
        }
        .shopping-cart .cart-total .flex .btn{ /* Checkout */
            background-color: var(--purple); 
            color: var(--white);
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<div class="heading">
    <h3>cart</h3> 
    <p> <a href="home.php">home</a> / cart </p>
</div>
<section class="shopping-cart">
    <h1 class="title">products added</h1>
    <div class="box-container">
        <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){  
        ?>
        <div class="box">
            <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
            <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_cart['name']; ?></div>
            <div class="price">৳<?php echo $fetch_cart['price']; ?>/-</div>
            <form action="" method="post">
                <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                <input type="submit" name="update_cart" value="Update" class="option-btn">
            </form>
            <div class="sub-total"> sub total : <span>৳<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-</span> </div>
        </div>
        <?php
        $grand_total += $sub_total;
            }
        }else{
            echo '<p class="empty">your cart is empty</p>';
        }
        ?>
    </div>
    <div style="margin-top: 2rem; text-align:center;">
        <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">Delete All</a>
    </div>

    <div class="cart-total">
        <p>grand total : <span>৳<?php echo $grand_total; ?>/-</span></p>
        <div class="flex">
            <a href="shop.php" class="option-btn">continue shopping</a>
            <a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
<script src="js/script.js"></script>
</body>
</html>