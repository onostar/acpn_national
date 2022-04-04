<?php
    require "../controller/server.php";
    session_start();
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ACPN is the National reguatory body for all pharmacist in Nigeria. it is formally known as Association of COmmunity Pharmacist of NIgeria">
    <meta name="keywords" content="ACPN, Conference, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>ACPN Store - Archive</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/foodie.png" size="32X32">
    <link rel="stylesheet" href="../controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>

    <?php include "mobile_menu.php";?>

    <main>
        <section id="searchResults">
            <?php
                $search_query = $connectdb->prepare("SELECT * FROM menu ORDER BY time_created");
                $search_query->execute();
                    
            ?>
            <h2><strong>All Items</strong></h2>
            <hr>
            <div class="results">
                
                <?php 
                    if(!$search_query->rowCount()){
                        echo "<p class='no_result'>'No result found!'</p>";
                    }
                    $shows = $search_query->fetchAll();
                    foreach($shows as $show):
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="showItems('<?php echo $show->item_id?>')">
                        <img src="../images/shop_bag.png" alt="featured item" title="click to view">

                    </a>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $show->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $show->item_prize?>">
                        <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $show->company?>">
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <input type="hidden" id="quantity" name="quantity" value="1">
                        <figcaption>
                            <div class="todo">
                                <p class="first"><?php echo $show->item_name?></p>
                                <p><i class="fas fa-store"></i> <?php
                                $get_company = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                $get_company->bindvalue("exhibitor_id",$show->company);
                                $get_company->execute();
                                $com = $get_company->fetch(); echo $com->company_name;?></p>
                                <!-- <p><?php echo $show->item_category?></p> -->
                                <span>₦ <?php echo number_format($show->item_prize)?></span>
                            </div>
                            <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button>
                        </figcaption>
                    </form>
                </figure>
                
                <?php endforeach ?>
            </div>
        </section>

        
    </main>
    <footer>
        <?php include "footer.php";?>
    </footer>

    <!-- <script src="bootstrap.min.js"></script> -->
    <script src="../controller/jquery.js"></script>
    <script src="../controller/script.js"></script>
    
</body>
</html>

<?php
    }else{
        header("Location: ../registration.php");
    }
?> 