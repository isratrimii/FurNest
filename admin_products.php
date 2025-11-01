<?php

include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
    header('location:login.php');
    exit;
}

if(isset($_POST['add_product'])){

    // 🎨 NEW: Details field
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $details = mysqli_real_escape_string($conn, $_POST['details']); // Add details field
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

    $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

    if(mysqli_num_rows($select_product_name) > 0){
        $message[] = 'product name already added';
    }else{
        // 🎨 UPDATE: SQL query with 'details' field
        $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, details, price, image, category) VALUES('$name', '$details', '$price', '$image', '$category')") or die('query failed');

        if($add_product_query){
            if($image_size > 2000000){
                $message[] = 'image size is too large';
            }else{
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'product added successfully!';
            }
        }else{
            $message[] = 'product could not be added!';
        }
    }
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('uploaded_img/'.$fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_products.php');
}

if(isset($_POST['update_product'])){

    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    // 🎨 NEW: Get updated details
    $update_details = mysqli_real_escape_string($conn, $_POST['update_details']);

    // 🎨 UPDATE: SQL query with 'details' field
    mysqli_query($conn, "UPDATE `products` SET name = '$update_name', details = '$update_details', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');

    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'uploaded_img/'.$update_image;
    $update_old_image = $_POST['update_old_image'];

    if(!empty($update_image)){
        if($update_image_size > 2000000){
            $message[] = 'image file size is too large';
        }else{
            mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
            move_uploaded_file($update_image_tmp_name, $update_folder);
            unlink('uploaded_img/'.$update_old_image);
        }
    }

    header('location:admin_products.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="add-products">
    <h1 class="title">Add New Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>add product</h3>
        <select name="category" class="box" required>
            <option value="" selected disabled>Select Category</option>
            <option value="cat">Cat</option>
            <option value="dog">Dog</option>
            <option value="hen">Hen</option>
            <option value="duck">Duck</option>
            <option value="rabbit">Rabbit</option>
            <option value="hamster">Hamster</option>
            <option value="bird">Bird</option>
            <option value="ginuea pig">Ginuea Pig</option>
            <option value="gerbil">Gerbil</option>
            <option value="chinchilla">Chinchilla</option>
            <option value="cat">Cat Food</option>
            <option value="cat">Cat Accessories</option>
            <option value="cat">Dog Food</option>
            <option value="cat">Dog Accessories</option>
            <option value="hen">Hen Food</option>
            <option value="hen">Hen Accessories</option>
            <option value="duck">Duck Food</option>
            <option value="duck">Duck Accessories</option>
            <option value="rabbit">Rabbit Food</option>
            <option value="rabbit">Rabbit Accessories</option>
            <option value="hamster">Hamster Food</option>
            <option value="hamster">Hamster Accessories</option>
            <option value="bird">Bird Food</option>
            <option value="bird">Bird Accessories</option>
            <option value="ginuea pig">Ginuea Pig Food</option>
            <option value="ginuea pig">Ginuea Pig Accessories</option>
            <option value="gerbil">Gerbil Food</option>
            <option value="gerbil">Gerbil Accessories</option>
            <option value="chinchilla">Chinchilla Food</option>
            <option value="chinchilla">Chinchilla Accessories</option>
            </select>
        <input type="text" name="name" class="box" placeholder="enter product name" required>
        <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
        <textarea name="details" class="box" placeholder="enter product details" required cols="30" rows="5"></textarea> 
        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
        <input type="submit" value="add product" name="add_product" class="btn">
    </form>
</section>

<section class="show-products">
    <div class="box-container">
        <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <div class="box">
            <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
            <div class="category">Category: <?php echo $fetch_products['category']; ?></div>
            <div class="details" style="font-size:1.5rem; color:#666; padding:1rem 0;">Details: <?php echo $fetch_products['details']; ?></div> 
            
            <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">Update</a>
            <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('Delete this product?');">Delete</a>
        </div>
        <?php
            }
        }else{
            echo '<p class="empty">no products added yet!</p>';
        }
        ?>
    </div>
</section>

<section class="edit-product-form">
    <?php
        if(isset($_GET['update'])){
            $update_id = $_GET['update'];
            $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
            if(mysqli_num_rows($update_query) > 0){
                $fetch_update = mysqli_fetch_assoc($update_query);
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
        <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
        <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
        <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required>
        <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required>
        <textarea name="update_details" class="box" required cols="30" rows="5"><?php echo $fetch_update['details']; ?></textarea>
        <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
        <input type="submit" value="Update" name="update_product" class="btn">
        <input type="reset" value="Cancel" id="close-update" class="option-btn">
    </form>
    <?php
            }
        } else {
            echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
        }
    ?>
</section>

<script src="js/admin_script.js"></script>
</body>
</html>