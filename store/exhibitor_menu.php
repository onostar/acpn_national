<?php
    require "controller/server.php";
    session_start();

?>
<?php
    if(isset($_GET['company'])){
        $restaurant_id = $_GET['company'];
    }
        $search_restaurant = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
        $search_restaurant->bindvalue("exhibitor_id", $restaurant_id);
        $search_restaurant->execute();
        $show = $search_restaurant->fetch();
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ACPN is the National reguatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>ACPN | <?php echo $show->company_name?></title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>

    <?php include "mobile_menu.php";?>

    <main>
        <section id="searchResults">
        <?php
            
            

        ?>
            <h2>Showing menu for "<strong><?php echo $show->company_name;?></strong>"</h2>
            <hr>
            <div class="results">
                
                <?php
                    $search_query = $connectdb->prepare("SELECT menu.item_name, menu.company, menu.item_category, menu.item_prize, menu.item_id, exhibitors.company_name, exhibitors.exhibitor_id FROM menu, exhibitors WHERE exhibitors.exhibitor_id = :exhibitor_id AND exhibitors.exhibitor_id = menu.company ORDER BY menu.item_name");
                    $search_query->bindvalue("exhibitor_id", $restaurant_id);
                    $search_query->execute();
                     
                    if(!$search_query->rowCount()){
                        echo "<p class='no_result'>'No result found!'</p>";
                    }
                    $shows = $search_query->fetchAll();
                    foreach($shows as $show):
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="loginFirst()">
                        <img src="images/shop_bag.png" alt="featured item">
                    </a>
                    
                        <figcaption>
                            <div class="todo">
                                <p class="first"><?php echo $show->item_name?></p>
                                <!-- <p><i class="fas fa-store"></i> <?php echo $show->company_name?></p> -->
                                <p><i class="fas fa-layer-group"></i> <?php
                                $get_category = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                                $get_category->bindvalue("category_id",$show->item_category);
                                $get_category->execute();
                                $cat = $get_category->fetch(); echo $cat->category;?></p>
                                <span>₦ <?php echo number_format($show->item_prize)?></span>
                            </div>
                            <!-- <button onclick="loginFirst();"><i class="fas fa-shopping-cart"></i></button> -->
                        </figcaption>
                    
                </figure>
            <?php endforeach?>

            </div>

        </section>

        
    </main>
    <footer>
        <?php include "footer.php";?>
    </footer>
    <script src="controller/jquery.js"></script>
    <script src="controller/script.js"></script>
    
</body>
</html>
