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
    <title>
        <?php
            $user_info = $connectdb->prepare("SELECT * FROM shoppers WHERE email = :email");
            $user_info->bindvalue('email', $user);
            $user_info->execute();
            $view = $user_info->fetch();
            echo $view->first_name . " " . $view->last_name. " - ACPN - E-store";
        ?>
    </title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="../controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>

    <?php include "mobile_menu.php";?>

    
    <main>
        <section id="itemContent">
            
            <div class="itemInfo">
                <?php
                    if(isset($_GET['item'])){
                        $item_id = $_GET['item'];
                    

                        $view_item = $connectdb->prepare("SELECT menu.item_name, menu.item_prize, menu.item_category, menu.item_foto, menu.item_description, menu.company, exhibitors.exhibitor_id, exhibitors.company_name, exhibitors.company_address, exhibitors.company_logo FROM menu, exhibitors WHERE menu.company = exhibitors.exhibitor_id AND item_id = :item_id");
                        $view_item->bindvalue('item_id', $item_id);
                        $view_item->execute();

                        $items = $view_item->fetchAll();
                        foreach($items as $item): 
                ?>
                <?php
                    $restaurant_name = $item->company_name;
                    $get_category = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                    $get_category->bindvalue("category_id",$item->item_category);
                    $get_category->execute();
                    $cat = $get_category->fetch();
                    $category = $cat->category;
                    $item_name = $item->item_name;
                ?>
                <figure class="item_details"> 
                    
                    <img src="../images/popular_bag.png" alt="item">
                    <form action="../controller/cart.php" method="POST">
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $item->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $item->item_prize?>">
                        <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $item->company?>">
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <figcaption>
                            <div class="menu_logo">
                                <img src="<?php echo "../../logos/".$item->company_logo;?>" alt="company">
                            </div>
                            <div class="clear"></div>
                            <p><span>Name:</span> <?php echo $item->item_name?></p>
                            <p><span>Category:</span> <?php echo $category?></p>
                            <p><span>Amount:</span> ₦<?php echo number_format($item->item_prize)?></p>
                            <p><span>Company:</span> <?php echo $item->company_name?></p>
                            <p><span>Company Location:</span> <?php echo $item->company_address?></p>
                            <input type="number" id="quantity" name="quantity" required placeholder="Select Quantity">
                            <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                        </figcaption>
                    </form>
                </figure>
                <div class="item_descriptions">
                    <hr>
                    <h3>Item Descriptions</h3>
                    <p><?php echo $item->item_description;?></p>
                </div>
                <?php endforeach; }?>
            </div>
        </section>
        <section id="featured">
            
            <h2>Related Items</h2>
            <div class="all_items">

                <?php
                    $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE /* item_name != :item_name AND  */item_category LIKE '%$item->item_category%' OR company LIKE '%$item->company%' ORDER BY time_created LIMIT 6");
                    // $select_featured->bindvalue("item_name", $item_name);
                    $select_featured->execute();
                    $shows = $select_featured->fetchAll();
                    foreach($shows as $show):
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="showItems('<?php echo $show->item_id?>')">
                        <img src="../images/shop_bag.png" alt="featured item">

                    </a>
                    <form action="../controller/cart.php" method="POST">
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
            <!-- <button id="view_more">View more</button>
            <button id="show_less">Show less</button> -->
        </section>
        <!-- <section id="shop" class="row">
            
        </section> -->
        
    </main>
    <?php
        /* if(isset($_SESSION['error_box'])){
            echo "<div class='error_box'><p>" . $_SESSION['error_box'] . "</p>
            <button id='close_error'>Ok</button></div>";
            unset($_SESSION['error_box']);
        } */
    ?>
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
        header("Location: index.php");
    }
?> 