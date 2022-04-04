<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
    
        $user_details = $connectdb->prepare("SELECT * FROM exhibitors WHERE company_email = :company_email");
        $user_details->bindvalue("company_email", $username);
        $user_details->execute();

        $users = $user_details->fetchAll();
        foreach($users as $user):
?>
<?php $my_company = $user->exhibitor_id;
    $_SESSION['my_company'] = $my_company;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PSN is the National regulatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>ACPN CONFERENCE| <?php echo $user->company_name;?></title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    <!-- <div class="loader">
        <img src="images/psn_logo.jpg" alt="PSN">
        <h2>Welcome to PSN national Conference registration</h2>
    </div> -->
    <main>
    <!-- <section class="top_head" id="topHeader">
            <div class="social_media">
                <p>
                    <span>Call us </span>(+234) 123 456 78
                </p>
                <p>
                    info@acpn.com
                </p>
            </div>
            <div class="contact_phone">
                <ul>
                    <li><a href="javascript:void(0);" class="showRequest">Schedule Appointment</a></li>
                    <li><a href="plans.html">Find plans</a></li>
                    <li><a href="javascript:void(0);">Pay Bills</a></li>
                    <li><a href="javascript:void(0);">Covid-19 Updates</a></li>
                </ul>
            </div>
        </section> -->
        <header>
            <h1 class="logo">
                <a href="exhibitors.php" title="ACPN">
                    <img src="../images/acpn_logo.png" alt="PSN Logo" class="img-fluid">
                </a>
            </h1>
            <h2 id="desktop_h2"><?php echo $user->company_name?></h2>
            <h2 id="mobile_h2">ACPN</h2>
            <div class="other_menu">
                <a href="#" title="Our Gallery">Exhibitor</a>
            </div>
            <div class="login">
                <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                <div class="login_option">
                    <div>
                        <button id="loginBtn"><a href="../controller/exh_logout.php">Log out</a></button>
                    </div>    
                </div>
            </div>
            <div class="cart" id="user_data">
                <a href="javascript:void(0);" title="<?php echo "Hello. " .$user->contact_person;?>" id="user_name">
                     <span><?php echo $user->contact_person;?></span> 
                    <div class="user_img">
                        <img src="<?php echo "../logos/".$user->company_logo;?>" alt="Logo">
                    </div>
                </a>
            </div>
            <div class="menu_icon">
                <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
            </div>
        </header>
    
        
        <div class="admin_main">
            <aside class="main_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        <div>
                            <button id="loginBtn"><a href="../controller/exh_logout.php">Log out</a></button>
                            
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="exhibitors.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                        <li><a href="javascript:void(0);" id="addCat" title="View floor plans" class="page_navs" data-page="floor_plans"><i class="fas fa-building"></i> Floor plans</a></li>
                        <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-money-check-alt"></i> Upload payment</a></li>
                        <li><a href="javascript:void(0);" id="addHot" title="Add items" class="page_navs" data-page="add_items"><i class="fas fa-paper-plane"></i>Add Items </a></li>
                        
                        <li><a href="javascript:void(0);" id="itemsBtn" class="page_navs" data-page="itemList"><i class="fas fa-gift"></i> Item list</a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="orderList"><i class="fas fa-shopping-cart"></i> Manage Orders </a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="deliveryList"><i class="fas fa-coins"></i> Delivery Reports </a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user"></i> Update profile</a></li>
                    </ul>
                </nav>
            </aside>
            <aside class="mobile_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        <div>
                            <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                            
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="user.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                    <li><a href="javascript:void(0);" id="addCat" title="View floor plans" class="page_navs" data-page="floor_plans"><i class="fas fa-building"></i> Floor plans</a></li>
                        <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-money-check-alt"></i> Upload payment</a></li>
                        <li><a href="javascript:void(0);" id="addHot" title="Add items" class="page_navs" data-page="add_items"><i class="fas fa-paper-plane"></i>Add Items </a></li>
                        
                        <li><a href="javascript:void(0);" id="itemsBtn" class="page_navs" data-page="itemList"><i class="fas fa-gift"></i> Item list</a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="orderList"><i class="fas fa-shopping-cart"></i> Manage Orders </a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="deliveryList"><i class="fas fa-coins"></i> Delivery Reports </a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user"></i> Update profile</a></li>
                    </ul>
                </nav>
            </aside>
            <section id="contents">
                <div class="success_message">
                    <p>
                        <?php
                            if(isset($_SESSION['success'])){
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            }
                        ?>
                    </p>
                </div>
                <div class="error_message">
                    <p>
                        <?php
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                    </p>
                </div>
                
                <?php
                    if(isset($_SESSION['reg_success'])){
                        echo "<p class='reg_success'>" . $_SESSION['reg_success'] . "</p>";
                        unset($_SESSION['reg_success']);
                    }
                ?>
                
                <div class="booth">
                    <?php
                        if($user->payment_status == 2):
                    ?>
                    <p><i class="fas fa-store"></i>Booth: <?php 
                        $get_booth = $connectdb->prepare("SELECT * FROM booths WHERE booth_id = :booth_id");
                        $get_booth->bindvalue("booth_id", $user->booth);
                        $get_booth->execute();
                        $boothsss = $get_booth->fetchAll();
                        foreach($boothsss as $boothss){
                            echo $boothss->hall." (".$boothss->booth.")";
                        }
                        
                    ?></p>
                    <?php endif?>
                </div>
                <div id="dashboard">
                    
                    <div class="cards" id="card2">
                        <a href="javascript:void(0)">
                            <p>Registration status</p>
                            <div class="infos">
                                <?php
                                    $get_status = $connectdb->prepare("SELECT payment_status FROM exhibitors WHERE company_email = :company_email");
                                    $get_status->bindvalue("company_email", $username);
                                    $get_status->execute();
                                    $stat = $get_status->fetch();
                                    if($stat->payment_status == 1){
                                        echo "<i class='fas fa-spinner'></i>";
                                    }elseif($stat->payment_status == 2){
                                        echo "<i class='fas fa-check'></i>";
                                    }else{
                                        echo "<i class='fas fa-ban'></i>";
                                    }
                                ?>
                                
                                <p>
                                    <?php
                                        
                                        if($stat->payment_status == 1){
                                            echo "Processing";
                                        }elseif($stat->payment_status == 2){
                                            echo "Approved";
                                        }else{
                                            echo "Pending";
                                        }

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <div class="cards" id="card4">
                        <a href="javascript:void(0)" class="page_navs" data-page="orderList">
                            <p>Pending Orders</p>
                            <div class="infos">
                                <i class="fas fa-cart-arrow-down"></i>
                                <p>
                                <?php
                                    $orders = $connectdb->prepare("SELECT * FROM orders WHERE company = :company AND order_status = 0");
                                    $orders->bindvalue('company', $user->exhibitor_id);
                                    $orders->execute();
                                    echo $orders->rowCount();
                                ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <div class="cards" id="card5">
                        <a href="javascript:void(0)">
                            <p>Daily sales</p>
                            <div class="infos">
                                <i class="fas fa-coins"></i>
                                <p>
                                    <?php
                                        
                                        $sales = $connectdb->prepare("SELECT SUM(item_price) AS today_sales  FROM orders WHERE company = :company AND order_status = 1 AND delivery_date = CURDATE()");
                                        $sales->bindvalue('company', $user->exhibitor_id);
                                        $sales->execute();
                                        
                                        $totals = $sales->fetchAll();
                                        foreach($totals as $total){
                                            echo "₦ " . number_format($total->today_sales, 2);
                                        }
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                   
                </div>
                <!--show tag -->
                <div id="paid_receipt" class="displays management">
                    <div class="info"></div>
                    
                    <?php 
                        $payment_status = $connectdb->prepare("SELECT * FROM exhibitors WHERE exhibitor_id = :exhibitor_id AND payment_status = 2");
                        $payment_status->bindvalue("exhibitor_id", $user->exhibitor_id);
                        $payment_status->execute();
                        if(!$payment_status->rowCount() > 0){
                            echo "";
                        }else{
                    ?>
                    <p class="reg_success">
                        You have successfully acquired a booth for the Eko Akate 2022 conference.<br> Kindly print your tag below;
                    </p>
                    <h2>Exhibitor Tag</h2>
                    <section class="clearanceSlip">
            
                        <div class="logos">
                            <img src="../images/acpn_logo.png" alt="Acpn logo">
                            <P>Eko Akate 2022</P>
                        </div>
                        <div class="slip">
                            <div class="slip_back">
                                <img src="../images/acpn_logo.png" alt="psn">
                            </div>
                            <div class="details">
                                <div class="logos_passport">
                                    <div class="passports">
                                        <img src="<?php echo '../logos/'.$user->company_logo;?>" alt="Company logo">
                                    </div>
                                </div>
                                <h3 class="full_name">EXHIBITOR</h3>
                                <p><?php echo $user->company_name?></p>
                                <p><span>ID: </span><?php echo $user->reg_number?></p>
                                <div class="qr_code">
                                <img src="../images/qr_code.png" alt="qr_code">
                                </div>
                            </div>
                        </div>
                        
                        
                    </section>
                    <div class="download">
                        <button id="print" onclick="window.print()">Print Tag <i class="fas fa-print"></i></button>
                    </div>
                    <?php }?>
                </div>
                <!-- check floor plans -->
                <div id="floor_plans" class="displays">
                    <h3>Floor plans</h3>
                    <div class="plans">
                        <figure>
                            <img src="../images/asian_hall.jpg" alt="Asian hall">
                        </figure>
                        <figure>
                            <img src="../images/2nd_hall.jpg" alt="Asian hall">
                        </figure>
                        <figure>
                            <img src="../images/marquee.jpg" alt="Marquee">
                        </figure>
                        <figure>
                            <img src="../images/corridor.jpg" alt="corridor">
                        </figure>
                        <figure>
                            <img src="../images/bar_area.jpg" alt="bar_area">
                        </figure>
                    </div>
                </div>
                <!-- upload payment for booth -->
                <div id="addCategories" class="displays">
                    <?php
                        $get_booth_status = $connectdb->prepare("SELECT * FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                        $get_booth_status->bindvalue("exhibitor_id", $user->exhibitor_id);
                        $get_booth_status->execute();
                        $statuss = $get_booth_status->fetchAll();
                        foreach($statuss as $status){
                            if($status->payment_status == 2){
                            
                        
                    ?>
                    <div class="add_user_form" id="booth_det">
                        <?php
                            $get_boothId = $connectdb->prepare("SELECT * FROM booths WHERE booth_id = :booth_id");
                            $get_boothId->bindvalue("booth_id", $status->booth);
                            $get_boothId->execute();
                            $booths = $get_boothId->fetchAll();
                            foreach($booths as $booth):
                        ?>
                        <h3>Your Booth details</h3>
                        <div class="inputs">
                                
                            <div class="data">
                                <h2><?php echo $booth->hall?></h2>
                            </div>
                            <div class="data">
                                <p>(<?php echo $booth->booth?>)</p>
                            </div>
                        </div>
                        <?php endforeach?>
                    </div>
                    <?php 
                        }elseif($status->payment_status == 1){
                            echo "<p class='alert'>Your booth request is still under propagation. Kindly await approval!</p>";
                        }else{
                    ?>
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Select booth with payment</h3>
                        <form method="POST"  id="addCatForm" action="../controller/upload_exh_payment.php" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $user->exhibitor_id?>" name="exhibitor_id">
                            <div class="inputs">
                                
                                <div class="data booth_type">
                                    <label for="booth_halls">Select Hall/category</label>
                                    <select name="booth_halls" id="booth_halls">
                                        <option value=""selected>Select hall category</option>
                                        <?php
                                            $get_hall = $connectdb->prepare("SELECT * FROM booth_categories ORDER BY hall");
                                            $get_hall->execute();
                                            $halls = $get_hall->fetchAll();
                                            foreach($halls as $hall):
                                        ?>
                                        <option value="<?php echo $hall->hall;?>"><?php echo $hall->hall;?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="data">
                                    <label for="booth">Choose Booths</label>
                                    <select name="booth_id" id="booth_id">
                                        <option value=""selected>select hall first</option>
                                    </select>
                                </div>
                              
                            </div>
                            <div class="inputs" id="price">
                                
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="payment">Upload Payment Slip</label>
                                    <input type="file" name="payment" id="payment" required>
                                </div>
                                <div class="data">
                                    <button type="submit" id="add_booth_pay" name="add_booth_pay">Upload payment <i class="fas fa-upload"></i></button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
                <!-- add items -->
                <div id="add_items" class="displays">
                    <?php
                        $payment_status = $connectdb->prepare("SELECT payment_status FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                        $payment_status->bindvalue("exhibitor_id", $user->exhibitor_id);
                        $payment_status->execute();
                        $status = $payment_status->fetch();
                        if($status->payment_status == 0){
                            echo "<p class='enrolled'>Registration status is currently pending!<br>Kindly upload booth payment</p>";
                        }elseif($status->payment_status == 1){
                            echo "<p class='enrolled'>Your payment is under review!<br>Kindly await approval</p>";
                        }else{
                    ?>
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Add items for exhibition</h3>
                        <form method="POST"  id="addCatForm" action="../controller/add_items.php">
                            
                            <div class="inputs">
                                <input type="hidden" name="company" id="company"value="<?php echo $user->exhibitor_id;?>">
                                <div class="data">
                                    <label for="category">Select Category</label>
                                    <select name="item_category" id="item_category" required>
                                        <option value=""selected>Choose a category</option>
                                        <?php
                                            $get_cat = $connectdb->prepare("SELECT * FROM categories ORDER BY category");
                                            $get_cat->execute();
                                            $cats = $get_cat->fetchAll();
                                            foreach($cats as $cat):
                                        ?>
                                        <option value="<?php echo $cat->category_id?>"><?php echo $cat->category?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="data">
                                    <label for="items">Enter Item name</label>
                                    <input type="text" name="item_name" id="item_name" required>
                                </div>
                                <div class="inputs">
                                    <div class="data">
                                        <label for="item_prize">Item Price (NGN)</label>
                                        <input type="number" name="item_prize" id="item_prize" required>
                                    </div>
                                    <div class="data">
                                        <button type="submit" id="addItem" name="addItem">Add item <i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    <?php } ?>
                </div>
                <!-- Item lists with price -->
                <div id="itemList" class="displays allResults">
                <h2>Item List</h2>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchItem" placeholder="Enter keyword">
                    </div>
                    <table id="item_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Item_name</td>
                                <td>Category</td>
                                <td>Price</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get_item = $connectdb->prepare("SELECT * FROM menu WHERE company = :company ORDER BY item_name");
                                $get_item->bindvalue("company", $user->exhibitor_id);
                                $get_item->execute();
                                $n = 1;
                                
                                $items = $get_item->fetchAll();

                                foreach($items as $item):
                            ?>
                            <tr>
                                <td style="text-align:center; color:red"><?php echo $n?></td>
                                <td><?php echo $item->item_name;?></td>
                                
                                <td><?php 
                                    $get_cat = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                                    $get_cat->bindvalue("category_id", $item->item_category);
                                    $get_cat->execute();
                                    $cat = $get_cat->fetch();
                                    echo $cat->category;
                                ?></td>
                                <td><?php echo "₦ ".number_format($item->item_prize, 2, ".")?></td>
                                    
                                
                            </tr>
                            <?php $n++; endforeach;?>
                        </tbody>
                    </table>
                    <?php
                        if(!$get_item->rowCount() > 0){
                            echo "<p class='no_result'>'No result found!'</p>";
                        }
                    ?>
                </div>
                <!-- manage orders -->
                <div id="orderList" class="displays allResults">
                    <h2>Manage pending order</h2>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchOrder" placeholder="Enter keyword">
                    </div>
                    <table id="orderTable">
                    
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Customer</td>
                                <td>Phone Number</td>
                                <td>item</td>
                                <td>Qty</td>
                                <td>Amount</td>
                                <td>Address</td>
                                <td>Date</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <?php
                            $n = 1;
                            $select_order = $connectdb->prepare("SELECT shoppers.first_name, shoppers.last_name, shoppers.email, shoppers.address, shoppers.city, shoppers.phone_number, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.company, orders.order_date, orders.order_time FROM shoppers, orders WHERE orders.company = :company AND shoppers.email = orders.customer_email AND orders.order_status = 0 ORDER BY orders.order_time");
                            $select_order->bindvalue('company', $user->exhibitor_id);
                            $select_order->execute();
                    
                            $rows = $select_order->fetchAll();
                            foreach($rows as $row):
                        ?>
                        <tbody>
                            <tr>
                                <td style="color:red; text-align:center;"><?php echo $n?></td>
                                <td><?php echo $row->first_name . " " . $row->last_name?></td>
                                <td><?php echo $row->item_name?></td>
                                <td><?php echo $row->phone_number?></td>
                                <td><?php echo $row->quantity?></td>
                                <td>₦ <?php echo $row->item_price?></td>
                                <td><?php echo $row->address . "<br>" . $row->city;?></td>
                                <td><?php echo $row->order_date?></td>
                                <td><button style="background:transparent; border:none; margin:0 auto;" title="Dispense Item" onclick="dispenseItemUser('<?php echo $row->order_id?>')"><i class="fas fa-truck" style="color:green; font-size:1.2rem;" ></i></button><button style="background:transparent; border:none; margin:0 auto;" title="Cancel Order" onclick="cancelOrderUser('<?php echo $row->order_id?>')"><i class="fas fa-plane-slash" style="color:red; font-size:1.2rem;" ></i></button></td>
                            </tr>
                            
                        </tbody>
                        <?php $n++; endforeach;?>
                        
                    </table>
                    <?php 
                            $check_order = $select_order->rowCount();
                            if(!$check_order){
                            echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                        }
                    ?>
                </div>
                <!-- successful deliveries list -->
                <div id="deliveryList" class="management displays">
                    <div class="select_date">
                        <form action="search_date.php" method="POST">
                            <div class="from_to_date">
                                <label>Select From Date</label><br>
                                <input type="date" name="from_date" id="from_date"><br>
                            </div>
                            <div class="from_to_date">
                                <label>Select to Date</label><br>
                                <input type="date" name="to_date" id="to_date"><br>
                            </div>
                            <button type="submit" name="search_date" id="search_date">Search</button>
                        </form>
                    </div>
                    <div class="new_data allResults">
                        <h2>Successful Deliveries for today</h2>
                        <hr>
                    
                        <div class="search">
                            <input type="search" id="searchDeliveries" placeholder="Enter keyword">
                        </div>
                        <table id="deliveriesTable">
                        
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Customer</td>
                                    <td>item</td>
                                    <td>Qty</td>
                                    <td>Amount</td>
                                    <td>Address</td>
                                    <td>Date</td>
                                </tr>
                            </thead>

                            <?php
                                $n = 1;
                                $todays_date = date("Y-m-d");
                                $select_deliveries = $connectdb->prepare("SELECT shoppers.first_name, shoppers.last_name, shoppers.email, shoppers.address, shoppers.city, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.company, orders.order_date, orders.delivery_date FROM shoppers, orders WHERE orders.company = :company AND shoppers.email = orders.customer_email AND orders.order_status = 1 AND orders.delivery_date = CURDATE() ORDER BY orders.delivery_date DESC");
                                $select_deliveries->bindvalue('company', $user->exhibitor_id);
                                $select_deliveries->execute();
                        
                                $rows = $select_deliveries->fetchAll();
                                foreach($rows as $row):
                            ?>
                            <tbody>
                                <tr>
                                    <td style="color:red; text-align:center"><?php echo $n?></td>
                                    <td><?php echo $row->first_name . " " . $row->last_name?></td>
                                    <td><?php echo $row->item_name?></td>
                                    <td><?php echo $row->quantity?></td>
                                    <td>₦ <?php echo $row->item_price?></td>
                                    <td><?php echo $row->address . "<br>" . $row->city;?></td>
                                    <td><?php echo $row->delivery_date?></td>
                                    
                                </tr>
                                
                            </tbody>
                            <?php $n++; endforeach;?>
                            
                        </table>
                        
                        
                        <?php 
                            $check_order = $select_deliveries->rowCount();
                            if(!$check_order){
                            echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                        }
                        if($select_deliveries){
                                $totalAmount = $connectdb->prepare("SELECT SUM(item_price) AS total_price FROM orders WHERE company = :company AND order_status = 1 AND delivery_date = CURDATE()");
                                $totalAmount->bindvalue('company', $user->exhibitor_id);
                                $totalAmount->execute();

                                $amounts = $totalAmount->fetchAll();
                                foreach($amounts as $amount){
                                    echo "<p style='color:green; font-size:1.3rem; text-align:right; text-decoration:underline; font-weight:bold; margin-top:30px;'>Total = ₦ ". number_format($amount->total_price, 2) . "</p>";
                                }
                            }
                        
                        ?>
                    </div>
                </div>
                <!-- update profile -->
                <div class="displays" id="profile">
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Update profile</h3>
                        <form method="POST"  id="addCatForm" action="../controller/update_exh_profile.php"">
                            <input type="hidden" value="<?php echo $user->exhibitor_id?>" name="user_id">
                            <div class="inputs">
                                <div class="data">
                                    <div class="user_passport">
                                        <img src="<?php echo "../logos/".$user->company_logo;?>" alt="Logo">
                                    </div>
                                    <!-- <input type="file" name="company_logo" id="company_logo"> -->
                                </div>
                                <div class="data">
                                    <label for="contact_person">Conference Reg Number:</label>
                                    <p style="font-weight:bold"><?php echo $user->reg_number?></p>
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" value="<?php echo $user->company_name;?>" id="company_name">
                                </div>
                                <div class="data">
                                    <label for="address">Address</label>
                                    <input type="text" name="company_address" value="<?php echo $user->company_address;?>" id="company_address">
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="company_phone">Company Phone</label>
                                    <input type="tel" name="company_phone" value="<?php echo $user->company_phone;?>" id="company_phone">
                                </div>
                                <div class="data">
                                    <label for="company_email">company_email</label>
                                    <input type="email" name="company_email" value="<?php echo $user->company_email;?>" id="other_number">
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="contact_person">contact person</label>
                                    <input type="text" name="contact_person" value="<?php echo $user->contact_person;?>" id="contact_person">
                                </div>
                                <div class="data">
                                    <label for="contact_phone">contact phone</label>
                                    <input type="text" name="contact_phone" value="<?php echo $user->contact_phone;?>" id="contact_phone">
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="Designation">Designation</label>
                                    <select name="designation" id="designation">
                                        <option value=""selected><?php echo $user->designation?></option>
                                        <option value="Director">Director</option>
                                        <option value="General manager">General Manager</option>
                                        <option value="Sales manager">Sales manager</option>
                                    </select>
                                </div>
                                <div class="data">
                                    <label for="portal_manager">E-store manager</label>
                                    <input type="text" name="portal_manager" value="<?php echo $user->portal_manager?>">
                                </div> 
                            </div>
                            <div class="inputs">    
                                <div class="data">
                                    <label for="manager_contact">Manager contact</label>
                                    <input type="tel" name="manager_contact" value="<?php echo $user->manager_contact?>">
                                </div>
                                <div class="data">
                                    <button type="submit" id="update" name="update">Update Profile <i class="fas fa-user"></i></button>
                                </div>
                            </div>
                            
                                
                        </form>
                    </div>  
                </div>
            </section>

        </div>
        
            
        
        
            
        
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>

<?php 
    endforeach;
    }else{
        header("Location: company_registration.php");
    }
?>