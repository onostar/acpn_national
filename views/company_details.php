<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_GET['company'])){
        $user = $_GET['company'];
    }
    $user_details = $connectdb->prepare("SELECT * FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
    // $user_details->bindvalue("user_email", $user);
    $user_details->bindvalue("exhibitor_id", $user);
    $user_details->execute();
    $users  = $user_details->fetchAll();

    foreach($users as $user):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ACPN is the National reguatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>ACPN Conference| <?php echo $user->company_name?></title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/ACPN_logO.PNg" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    
    <section class="top_head" id="topHeader">
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
    </section>
    <header>
        <h1 class="logo">
            <a href="admin.php" title="ACPN">
                <img src="../images/acpn_logo.png" alt="PSN Logo" class="img-fluid">
            </a>
        </h1>
        <div class="search">
            <form class="form-inline" method="POST">
                <input type="search" name="search_items" placeholder="search members, reg_number, search phone number">
                <button type="submit" name="searchBtn" class="main_searchbtn" id="searchBtn">Search <i class="fas fa-search"></i></button>
                <button type="submit" name="search_items" class="mobilesearchbtn" id="searchBtn"><i class="fas fa-search"></i></button>
            </form>
            
        </div>
        <div class="other_menu">
            <a href="admin.php" title="Our Gallery">Admin</a>
        </div>
        <div class="login">
            <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
            <div class="login_option">
                <div>
                    <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                    
                </div>
            </div>
        </div>
        <div class="cart">
            <a href="javascript:void(0);" title="Registered members"><i class="fas fa-users"></i> Registered 
                <span id="cart_value"><?php
                $get_members = $connectdb->prepare("SELECT * FROM users WHERE last_name != 'Admin' AND last_name != 'User'");
                $get_members->execute();
                echo $get_members->rowCount();
                ?> </span></a>
        </div>
        <div class="menu_icon">
            <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
        </div>
    </header>

    <main>
        <div class="success">
            <?php
                if(isset($_SESSION['success'])){
                    echo "<p>" .$_SESSION['success']. "</p>";
                    unset($_SESSION['success']);
                }
            ?>
        </div>
        <!-- search results -->
                
        <button onclick="window.close()" id="goback">Go back <i class ="fas fa-angle-double-left"></i></button>
        <h2 id="reg_slip">Company Details</h2>
        <hr>
        <div id="company_details">
            <div class="information">
                <div class="core">
                    <h3><?php echo $user->company_name?></h3>
                    <p><i class="fas fa-map"></i> <?php echo $user->company_address;?></p>
                    <p><i class="fas fa-envelope"></i> <?php echo $user->company_email?></p>
                    <p><i class="fas fa-phone"></i> <?php echo $user->company_phone?></p>
                </div>
                <div class="info_logo">
                    <img src="<?php echo "../logos/".$user->company_logo?>" alt="Company logo">
                </div>
            </div>
            <div class="other_details">
                <div class="con_det">
                    <p>Contact person: <span><?php echo $user->contact_person?></span></p>
                </div>
                <div class="con_det">
                    <p>Booth: <span><?php 
                        if($user->booth == 2){
                            $get_booth = $connectdb->prepare("SELECT * FROM booths WHERE booth_id = :booth_id");
                            $get_booth->bindvalue("booth_id", $all->booth);
                            $get_booth->execute();
                            $booths = $get_booth->fetchAll();
                            foreach($booths as $booth){
                                echo $booth->hall."(".$booth->booth.")";
                            }
                        }else{
                            echo "Not paid for booth";
                        }
                    ?></span></p>
                </div>
                <div class="con_det">
                    <p>Designation: <span><?php echo $user->designation?></span></p>
                </div>
                <div class="con_det">
                    <p>Contact Phone: <span><?php echo $user->contact_phone?></span></p>
                </div>
                <div class="con_det">
                    <p>E-Store manager: <span><?php echo $user->portal_manager?></span></p>
                </div>
                <div class="con_det">
                    <p>E-store contact: <span><?php echo $user->manager_contact?></span></p>
                </div>
                <div class="con_det">
                    <p>Staffs in booth: <span><?php echo $user->staff_number?></span></p>
                </div>
                <div class="con_det">
                    <p>Conference Reg_number: <span><?php echo $user->reg_number?></span></p>
                </div>
            </div>
        </div>
        
      
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>

<?php endforeach;?>