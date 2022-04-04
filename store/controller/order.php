<?php
    include "server.php";
    session_start();

    
    if(isset($_POST['order'])){
        $customer = htmlspecialchars(stripslashes($_POST['customer']));
        $today_date = date("Y-m-d");
        $order_time = date("Y-m-d h:i:s");
        $status = 0;
        $ran_number = rand(1, 1000);
        $order_dt = date("Ymdhis");
        $order_num = $ran_number . $order_dt;
        $confirm_order = $connectdb->prepare("INSERT INTO orders (customer_email, item_name, quantity, item_price, company) SELECT customer_email, item_name, quantity, item_price, company FROM cart WHERE customer_email = :customer_email");
        $confirm_order->bindvalue('customer_email', $customer);
        $confirm_order->execute();

        if($confirm_order){
            /* insert transaction date and number */
            $insert_date = $connectdb->prepare("UPDATE  orders SET order_number = :order_number WHERE customer_email = :customer_email AND order_time = CURTIME()");
            // $insert_date->bindvalue('order_date', $today_date);
            $insert_date->bindvalue('order_number', $order_num);
            $insert_date->bindvalue('customer_email', $customer);
            // $insert_date->bindvalue('order_time', $order_time);
            
            
            $insert_date->execute();


            /* delete from cart */
            $delete_cart = $connectdb->prepare("DELETE FROM cart WHERE customer_email = :customer_email");
            $delete_cart->bindvalue('customer_email', $customer);
            $delete_cart->execute();

            /* get customer details */
            $get_customer = $connectdb->prepare("SELECT first_name, last_name FROM shoppers WHERE email = :email");
            $get_customer->bindvalue('email', $customer);
            $get_customer->execute();
            $details = $get_customer->fetchAll();
            foreach($details as $detail){
                $customer_name = $detail->first_name . ' ' . $detail->last_name;
            }

            /* get admin */
            $get_admin = $connectdb->prepare("SELECT user_email FROM users WHERE user_email = 'admin@acpnconference.com'");
            $get_admin->execute();
            $rows = $get_admin->fetchAll();
            foreach($rows as $row){
                $admin_mail = $row->user_email;
            }

            /* get restaurant */
            $get_company = $connectdb->prepare("SELECT exhibitors.exhibitor_id, exhibitors.company_email, exhibitors.company_name, orders.company, orders.customer_email FROM exhibitors, orders WHERE orders.customer_email = :customer_email AND exhibitors.exhibitor_id = orders.company");
            $get_company->bindvalue('customer_email', $customer);
            $get_company->execute();
            $shows = $get_company->fetchAll();
            foreach($shows as $show){
                $company_mail = $show->company_email;
                $company = $show->company_name;
            }

            /* Send mail to Admin */
            $subject = "Eko Akate 2022 - New Order";
            $message = "You have a new order from $customer_name to $company n/ Click the Link below to view details n/ https://acpnconference.com/views/admin";
            $header = "FROM: ACPN Eko Akate 2022";
            mail($admin_mail, $subject, $message, $header) or die("Error!");

            /* Send mail to Restaurant */
            $subject2 = "ACPN Eko Akate 2022 - New Order";
            $message2 = "You have a new order from $customer_name to $company n/ Click the Link below to view details n/ https://acpnconference.com/views/exhibitors";
            $header2 = "FROM: ACPN Eko Akate";
            mail($restaurant_mail, $subject2, $message2, $header2) or die("Error!");

            /* success message */
            $_SESSION['success'] = "You have placed your order. Thank You!";

            header("Location: ../view/shopping_cart.php");
        }else{
            $_SESSION['error'] = "Failed to place order!";
            header("Location: ../view/shopping_cart.php");
        }
    }
?>