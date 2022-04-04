<?php 
    include "controller/server.php";
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ACPN is the National reguatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>ACPN Akate 2022 E-Store</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="controller/style.css">
    
</head>
<body>
    <!-- <div class="loader">
        <img src="images/acpn_logo.png" alt="Eko Akete 2022">
        <h1>Welcome to Eko Akete 2022</h1>

    </div>
<div class="main"> -->
    <?php include "header.php";?>
    <p class="successful">
        <?php
            if(isset($_SESSION['success'])){
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
        ?>
        <?php
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
    </p>
    <section id="bannerContents">
        <aside id="asideLeft" class="main_cat">
            <nav id="index_nav">
            <ul>
                <li><a href="exhibitors.php"><i class="fas fa-store"></i>Exhibitors</a></li>
                <?php
                    $get_categories = $connectdb->prepare("SELECT * FROM categories ORDER BY category");
                    $get_categories->execute();
                    $cats = $get_categories->fetchAll();
                    foreach($cats as $cat):
                ?>
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="<?php echo $cat->category_id?>">
                            <i class="fas fa-shopping-cart"></i> <input type="submit" value="<?php echo $cat->category?>" name="check_category">
                        </form> 
                    </li>
                    
                    
                    <?php endforeach;?>
                </ul>
            </nav>
        </aside>

        <?php include "mobile_menu.php";?>
        
        <section id="banner">
            <div class="slide">
                <div class="slides">
                    <div class="slide_img">
                        <img src="images/banner1.jpg" alt="ACPN banner">
                    </div>
                    <div class="description">
                        <h2>Eko Akate 2022</h2>
                        <p>Every thing you need when ever you need it</p>
                        <div class="links">
                            <a onclick="loginFirst()" href="javascript:void(0);"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                            <a href="contact.php"><i class="fas fa-photo-video"></i> Learn more</a>
                        </div>
                        
                    </div>
                </div>
                <div class="slides">
                    
                    <div class="slide_img">
                        <img src="images/banner2.png" alt="ACPN Banner">
                    </div>
                    <div class="description">
                    <h2>Eko Akate 2022</h2>
                        <p>Every thing you need when ever you need it</p>
                        <div class="links">
                            <a class="appointment" href="javascript:void(0);"><i class="fas fa-paper-plane"></i> Get in touch</a>
                            <!-- <a href="javascript:void(0);"><i class="fas fa-photo-video"></i> View Media</a> -->
                        </div>
                        
                    </div>
                    
                </div>
                <div class="slides">
                    
                    <div class="slide_img">
                        <img src="images/banner3.jpeg" alt="ACPN Banner">
                    </div>
                    <div class="description">
                    <h2>Eko Akate 2022</h2>
                        <p>Every thing you need when ever you need it</p>
                        <div class="links">
                            <a onclick="loginFirst()" href="javascript:void(0);"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                            <!-- <a href="gallery.php"><i class="fas fa-photo-video"></i> Gallery</a> -->
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </section>
        <aside id="asideRight">
            <nav id="help">
                <ul>
                    <li>
                        <a href="contact.php" title="Get in touch">
                            <i class="far fa-question-circle"></i>
                            <div class="note">
                                <h3>Help center</h3>
                                <p>Ask ACPN</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="about.php" title="who we are">
                            <i class="fas fa-street-view"></i>
                            <div class="note">
                                <h3>About us</h3>
                                <p>Who we are</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="fas fa-hand-holding-usd"></i>
                            <div class="note">
                                <h3>Refunds</h3>
                                <p>Money back guarantee</p>
                            </div>
                        </a>
                    </li>                          
                </ul>
            </nav>
            <div id="adds">
                
                <img src="images/acpn_add.png" alt="ACPN adds">
                
            </div>
        </aside>
    </section>
    <section id="links">
        <div class="link_tags">
            <a href="javscript:void(0);">
                <i class="fas fa-users"></i>
                <p>Partners</p>
            </a>
        </div>
        <div class="link_tags">
            <a href="javscript:void(0);">
                <i class="fas fa-coins"></i>
                <p>Top deals</p>
            </a>
        </div>
        <div class="link_tags">
            <a href="#popular">
                <i class="fas fa-star"></i>
                <p>Popular</p>
            </a>
        </div>
        <div class="link_tags">
            <a href="exhibitors.php">    
                <i class="fas fa-home"></i>
                <p>Companies</p>
            </a>
        </div>
    </section>
    <main>
        <!-- featured items -->
        <section id="featured">
            <h2>Featured Items</h2>
            <div class="featured">
                <?php
                    $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE featured_item = 1 ORDER BY time_created DESC LIMIT 12");
                    $select_featured->execute();
                    $rows = $select_featured->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                <a href="javascript:void(0);" onclick="loginFirst();">
                        <img src="images/popular_bag.png" alt="featured item">
                        
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <p><i class="fas fa-layer-group"></i> <?php
                                $get_category = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                                $get_category->bindvalue("category_id",$row->item_category);
                                $get_category->execute();
                                $cat = $get_category->fetch(); echo $cat->category;?></p>
                                <span>₦ <?php echo number_format($row->item_prize)?></span>
                            </div>
                            <button title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button>
                        </figcaption>
                    
                    </a>
                </figure>
                
                <?php endforeach ?>
                
            </div>
            <!-- <form action="controller/more_featured.php" method="POST">
                <input type="hidden" name="moreFeatured" value="1" id="moreFeatured">
                <button type="submit" id="viewMore" name="viewMore">View more</button>
                
            </form> -->
            
        </section>
        <!-- Popular items -->
        <section id="popular">
            <h3></h3>
            <h2>Popular Items <i class="fas fa-star"></i><i class="fas fa-star"></i></h2>
            <div class="all_items popular_items">
                <?php
                    /* $select_all = $connectdb->prepare("SELECT menu.item_name, menu.item_category, menu.restaurant_name, menu.item_prize, menu.item_foto, menu.item_id, orders.item_name FROM orders, menu WHERE menu.item_name = orders.item_name AND orders.quantity >= 2 GROUP BY orders.item_name"); */
                    $select_all = $connectdb->prepare("SELECT * FROM menu RIGHT JOIN orders USING (item_name) GROUP BY item_name HAVING SUM(orders.quantity) >= 4  ORDER BY orders.delivery_date LIMIT 6");
                    $select_all->execute();
                    $rows = $select_all->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="loginFirst();">
                        <img src="images/popular_bag.png" alt="featured item">
                        
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <p><i class="fas fa-layer-group"></i> <?php
                                $get_category = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                                $get_category->bindvalue("category_id",$row->item_category);
                                $get_category->execute();
                                $cat = $get_category->fetch(); echo $cat->category;?></p>
                                <span>₦ <?php echo number_format($row->item_prize)?></span>
                            </div>
                            <button title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button>
                        
                        </figcaption>
                    </a>
                </figure>
                
                <?php endforeach ?>
                
            </div>
            <!-- <button id="more_popular">View more</button>
            <button id="less_popular">Show less</button> -->
        </section>
        
        <!-- All items -->
        <section id="all_items">
            <h2>Check the best collections for you!</h2>
            <div class="all_items">
                <?php
                    $select_all = $connectdb->prepare("SELECT * FROM menu ORDER BY time_created DESC LIMIT 10");
                    $select_all->execute();
                    $rows = $select_all->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="loginFirst();">
                        <img src="images/shop_bag.png" alt="featured item">
                        
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <p><i class="fas fa-store"></i> <?php
                                $get_company = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                $get_company->bindvalue("exhibitor_id",$row->company);
                                $get_company->execute();
                                $com = $get_company->fetch(); echo $com->company_name;?></p>
                                <span>₦ <?php echo number_format($row->item_prize)?></span>
                            </div>
                            <button title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button>
                        </figcaption>
                    </a>
                </figure>
                
                <?php endforeach ?>
                
            </div>
            <button id="more" onclick="loginFirst()">View more <i class="fas fa-angle-double-right"></i></button>
            <!-- <button id="less">Show less</button> -->
        </section>
    </main>
    <footer>
        <?php include "footer.php"; ?>
    </footer>
    <div id="loginPrompt">
        <p>Kindly Login to View Item!</p>
        <div class="log">
            <a href="registration.php" title="Login here">Login</a>
            <a href="javascript:void();" id="closeBox" title="Close box">Close</a>
        </div>
    </div>
<!-- </div> -->
    <script src="controller/jquery.js"></script>
    <script src="controller/script.js"></script>
</body>
</html>