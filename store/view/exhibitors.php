<?php
    require "../controller/server.php";
    session_start();
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="description" content="ACPN is the National reguatory body for all pharmacist in Nigeria. it is formally known as Association of COmmunity Pharmacist of NIgeria">
    <meta name="keywords" content="ACPN, Conference, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>
        <?php
            $user_info = $connectdb->prepare("SELECT * FROM shoppers WHERE email = :email");
            $user_info->bindvalue('email', $user);
            $user_info->execute();
            $view = $user_info->fetch();
            echo $view->first_name . " " . $view->last_name. " - ACPN - Companies";
        ?>
    </title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="../controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>

    <?php include "mobile_menu.php";?>

    <main>
        <section id="searchResults">
            <?php
                
                    $search_query = $connectdb->prepare("SELECT * FROM exhibitors ORDER BY company_name");
                    $search_query->execute();
                    
                

            ?>
            <h2>Eko Akate 2022 Exhibitors</h2>
            <hr>
            <div class="results">
                
                <?php 
                    $shows = $search_query->fetchAll();
                    foreach($shows as $show):
                ?>
                <figure>
                    <a href="javascript:void(0);" title="View menu" onclick="showMenus('<?php echo $show->exhibitor_id?>')">
                        <img src="<?php echo '../../logos/'.$show->company_logo;?>" alt="featured item">
                    </a>
                    <form>
                        <figcaption>
                            <div class="todo">
                                <p class="first"><?php echo $show->company_name?></p>
                                <p><i class="fas fa-street-view"></i> <?php echo $show->company_address?></p>
                                <!-- <p><i class="fas fa-map"></i> <?php echo $show->restaurant_location?></p> -->
                            </div>
                            <!-- <button type="submit" name="view_menu" id="view_menu" title="View Restaurant menu" class="view_menu"><i class="fas fa-document"></i></button> -->
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
    
    <script src="../controller/jquery.js"></script>
    <script src="../controller/script.js"></script>
    
</body>
</html>
<?php
    }else{
        header("Location: ../index.php");
    }
?> 