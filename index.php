<?php
    session_start();
    include "controller/connections.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ACPN is the National reguatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>ACPN National Conference Portal</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<div class="loader">
        <img src="images/acpn_logo.png" alt="Eko Akete 2022">
        <h1>Welcome to Eko Akete 2022</h1>

    </div>
    <div class="main">
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
    <section id="banner">
        <header id="mainHeader" class="main_header">
            <h1>
                <a href="index.php">
                    <img src="images/acpn_logo.png" alt="ACPN">
                </a>
            </h1>
            <nav id="navigation">
                <ul>
                    <!-- <li><a href="" title="who we are">Who we are</a></li> -->
                   
                    <li id="estore"><a href="store/index.php" target="_blank"title="Order for items"><i class="fas fa-store"></i>E-store</a></li>
                    <!-- <li><a href="contact.html" title="Contact us">Get in touch</a></li> -->
                    <li id="exhi"><a href="views/exhibitor_login.php" title="Exhibitor login portal">Exhibitors Login <i class="fas fa-sign-in-alt"></i></a></li>
                    <!-- <li><a href="blog.html" title="Job recruitment">Our Blog</a></li> -->
                    <li id="login"><a href="views/registration.php" title="Members Portal">Delegate Login <i class="fas fa-sign-in-alt"></i></a></li>
                </ul>
            </nav>
            <div class="menu-icon" onclick="displayMenu()"><a href="javascript:void(0);"><i class="fas fa-bars"></i></a></div>
        </header>
        <div id="slider">
            <div class="slides">
                <div class="slide">
                    <div class="banner_img">
                        <img src="images/acpn_2021.jpg" alt="ACPN">
                    </div>
                    <div class="taglines">
                        <div class="taglines_note">
                            <h2>Association of community pharmacists of nigeria</h2>
                            <p>Welcome to the registration portal for the 41ST Annual National Scientific Conference (Eko Akete 2022)</p>
                            <div class="btns">
                                <!-- <a href="javascript:void(0)" class="showRequest">Schedule an Appointment Now</a> -->
                                <a href="exhibitor_login.php">Exhibitors <i class="fas fa-store"></i></a>
                                <a href="views/registration.php">Delegates <i class="fas fa-sign-in-alt"></i></a>
                            </div>
                        </div>
                        <div class="taglines_mission">
                            <div class="vismis_slide">
                                <div class="datas missions">
                                    <div class="icon">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <div>
                                        <h3>Date</h3>
                                        <p>The Conference will take place from<br>
                                        24th July to 29th July, 2022</p>
                                    </div>
                                </div>
                                <div class="datas vissions">
                                    <div class="icon">
                                        <i class="fas fa-hotel"></i>
                                    </div>
                                    <div>
                                        <h3>Venue</h3>
                                        <p>Festival Hotel, Festac, Lagos state</p>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="banner_img">
                        <img src="images/pharmacist.png" alt="ACPN">
                    </div>
                    <div class="taglines">
                        <div class="taglines_note">
                            <h2>The 41st annual Scientific  conference (Lagos 2022)</h2>
                            <p>Be a part of this year's annual conference From 24th to 29th July, 2022 at Festival Hotel, Festac, Lagos state</p>
                            qss
                            <div class="btns">
                                <!-- <a href="javascript:void(0)" class="showRequest">Schedule an Appointment Now</a> -->
                                <a href="store/index.php">Online store <i class="fas fa-store"></i></a>
                                <a href="views/registration.php">Delegates <i class="fas fa-sign-in-alt"></i></a>
                            </div>
                        </div>
                        <div class="taglines_mission">
                            <div class="vismis_slide">
                            <div class="datas missions">
                                    <div class="icon">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <div>
                                        <h3>Date</h3>
                                        <p>The Conference will take place from<br>
                                        24th July to 29th July, 2022</p>
                                    </div>
                                </div>
                                <div class="datas vissions">
                                    <div class="icon">
                                        <i class="fas fa-hotel"></i>
                                    </div>
                                    <div>
                                        <h3>Venue</h3>
                                        <p>Festival Hotel, Festac, Lagos state</p>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        <!-- <div class="client_assess">
            <a href="#reqMaster">Client Assessment Form</a><i class="fas fa-plus"></i>
        </div> -->
    </section>
</div>

    <script src="jquery.js"></script>
    <script src="script.js"></script>
</body>
</html>