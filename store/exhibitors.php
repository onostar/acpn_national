<?php
    require "controller/server.php";
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ACPN is the National reguatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>ACPN Akate 2022 | Companies</title>
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
                        <img src="<?php echo '../logos/'.$show->company_logo;?>" alt="featured item">
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
    
    <script src="controller/jquery.js"></script>
    <script src="controller/script.js"></script>
    
</body>
</html>
