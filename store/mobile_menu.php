<div id="mobile_menu">
            
    <aside id="asideLeft">
        <div class="login">
            <button id="loginDiv"><i class="far fa-user"></i> <a href="registration.php">Login</a> <i class="fas fa-sign-in-alt"></i></button>
        </div>
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
                            <input type="hidden" name="item_cat" value="<?php echo $cat->category?>">
                            <i class="fas fa-shopping-cart"></i> <input type="submit" value="<?php echo $cat->category?>" name="check_category">
                        </form> 
                    </li>
                    
                    
                    <?php endforeach;?>
            </ul>
        </nav>
        <hr>
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
                    <a href="about.php" title="Who we are">
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
    </aside>
    
</div>