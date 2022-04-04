<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    // if(isset($_POST['request'])){
        $pcn = htmlspecialchars(stripslashes($_POST['bulk_delegate']));
        $hotel = htmlspecialchars(stripslashes($_POST['user_hotel']));
        $room = htmlspecialchars(stripslashes($_POST['user_room']));
        $date = htmlspecialchars(stripslashes($_POST['check_date']));
        $amount = htmlspecialchars(stripslashes($_POST['amount']));
        $requester = htmlspecialchars(stripslashes($_POST['bulk_requester']));
        $start_date = date("2022-07-24");
        $end_date = date("2022-07-25");
        if($date == $start_date || $date == $end_date){
            
            $check_status = $connectdb->prepare("SELECT * FROM request_hotel WHERE pcn_number = :pcn_number AND request_status = 0");
            $check_status->bindvalue("pcn_number", $pcn);
            $check_status->execute();
            
            if($check_status->rowCount() > 0){
                // $_SESSION['error'] = "You already have submitted a request! \r\n Kindly await approval";
                // header("Location: ../views/user.php");
                echo "<p class='exist'>This delegate has already submitted a request. Kindly await approval</p>";
            }else{
                /* check again */
                $check_confirmed = $connectdb->prepare("SELECT * FROM request_hotel WHERE pcn_number = :pcn_number AND request_status = 1");
                $check_confirmed->bindvalue("pcn_number", $pcn);
                $check_confirmed->execute();
                if($check_confirmed->rowCount() > 0){
                    // $_SESSION['error'] = "You already have aaccomodation!";
                    // header("Location: ../views/user.php");
                    echo "<p class='exist'>This user has accomodation already!</p>";
                }else{
                    $update_status = $connectdb->prepare("INSERT INTO request_hotel (pcn_number, hotel, room, request_by, check_in_date, amount) VALUES (:pcn_number, :hotel, :room, :request_by, :check_in_date, :amount)");
                    $update_status->bindvalue("hotel", $hotel);
                    $update_status->bindvalue("room", $room);
                    $update_status->bindvalue("pcn_number", $pcn);
                    $update_status->bindvalue("request_by", $requester);
                    $update_status->bindvalue("check_in_date", $date);
                    $update_status->bindvalue("amount", $amount);
                    $update_status->execute();
                    if($update_status){
                        
                    ?>
                        <h2>Members requested</h2>
                        <hr>
                        <div class="search">
                            <input type="search" id="searchReq" placeholder="Enter keyword">
                        </div>
                        <table id="req_table">
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Delegate</td>
                                    <td>Hotel</td>
                                    <td>Room</td>
                                    <td>Price</td>
                                    <td>Check in date</td>
                                    <td>Status</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $get_delegates = $connectdb->prepare("SELECT * FROM request_hotel WHERE request_by = :request_by AND pcn_number != request_by ORDER BY request_date");
                                    $get_delegates->bindvalue("request_by", $requester);
                                    $get_delegates->execute();
                                    $n = 1;
                                    
                                    $delegates = $get_delegates->fetchAll();

                                    foreach($delegates as $delegate):
                                ?>
                                <tr>
                                    <td style="text-align:center; color:red"><?php echo $n?></td>
                                    <td><?php 
                                        $get_user = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
                                        $get_user->bindvalue("pcn_number", $delegate->pcn_number);
                                        
                                        $get_user->execute();
                                        $userss = $get_user->fetchAll();
                                        foreach($userss as $users){
                                            echo $users->last_name . " ". $users->first_name;
                                        }
                                        
                                    ?></td>
                                    <td><?php echo $delegate->hotel;?></td>
                                    <td><?php echo $delegate->room?></td>
                                    <td><?php 
                                        $get_price = $connectdb->prepare("SELECT price FROM rooms WHERE hotel = :hotel AND room = :room");
                                        $get_price->bindvalue("hotel", $delegate->hotel);
                                        $get_price->bindvalue("room", $delegate->room);
                                        $get_price->execute();
                                        $price = $get_price->fetch();
                                        echo "₦ ".number_format($price->price, 2, ".")?></td>
                                     <td><?php echo date("jS M, Y", strtotime($delegate->check_in_date))?></td>   
                                    <td><?php
                                        if($delegate->request_status ==1){
                                            echo "Approved";
                                        }else{
                                            echo "Pending";
                                        }
                                    ?></td>
                                </tr>
                                <?php $n++; endforeach;?>
                            </tbody>
                        </table>
                        <div class="total">
                            <P>Amount Due: <?php
                                $get_due = $connectdb->prepare("SELECT SUM(amount) AS amount_due FROM request_hotel WHERE request_by = :request_by AND request_by != pcn_number AND request_status = 0");
                                $get_due->bindvalue("request_by", $requester);
                                $get_due->execute();
                                $amount_due = $get_due->fetch();
                                echo "₦ ".number_format($amount_due->amount_due);
                            ?></P>
                        </div>
                        <?php
                            if(!$get_delegates->rowCount() > 0){
                                echo "<p class='no_result'>'No result found!'</p>";
                            }
                        
                
                    }else{
                        // $_SESSION['error'] = "Request failed";
                        echo "<p class='exist'>Failed to submit</p>";
                    }
                }
            }
            
        }else{
            // $_SESSION['error_note'] = "Error! Check in date cannot be farther than ".date("jS, M, Y", strtotime($end_date)). " nor before ".date("jS, M, Y", strtotime($start_date));
            // header("Location: ../views/user.php");
            echo "<p class='exist'>Error! Check in date cannot be farther than ".date('jS, M, Y', strtotime($end_date)). " nor before ".date('jS, M, Y', strtotime($start_date))."</p>";
        }

    // }

?>