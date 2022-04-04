//animations on scroll
window.onscroll = function(){changeHeader();
}
/*change header */
function changeHeader(){
    if(document.body.scrollTop > 5 || document.documentElement.scrollTop > 5){
        document.getElementById('mainHeader').className = 'new_header';
        /* document.getElementById('h1').style.width = '15%'; */
        /* document.querySelector('.logo').className = 'new-logo'; */
    }
    else{
        document.getElementById('mainHeader').className = 'main_header';
        /* document.getElementById('h1').style.width = '25%'; */
        /* document.querySelector('.logo').className = 'logo'; */
    }
}
/* submit appointment form */
/* $(document).ready(function(){
    $("#book").click(function(){
        let customer_name = document.getElementById("customer_name").value;
        let customer_phone = document.getElementById("customer_phone").value;
        let customer_mail = document.getElementById("customer_mail").value;
        let service = document.getElementById("service").value;
        let appointment_date = document.getElementById("appointment_date").value;
        let appointment_address = document.getElementById("appointment_address").value;
        let notes = document.getElementById("notes").value;
        // alert(notes);

        $.ajax({
            type: "POST",
            url: "appointment.php",
            data: {customer_name:customer_name, customer_phone:customer_phone, customer_mail:customer_mail, service:service, appointment_date:appointment_date, appointment_address:appointment_address, notes:notes},
            success: function(response){
                $(".result").html(response);
            }
        });
        // $(".appointment_page").show();
        return false;
    })
}) */

//display home page after intro
/* setTimeout(function(){
    $(".main").show();
    $(".loader").hide();
}, 3000) */
//display login on desktop page
$(document).ready(function(){
    $("#loginDiv").click(function(){
        $(".login_option").toggle();
        // alert("work");
    });
    
});
/* get hotels from upload payment form */
function showHotels(hotel){
    if(hotel == "yes"){
        document.getElementById("hotels").style.display = "block";
    }else{
        document.getElementById("hotels").style.display = "none";
    }
}

/* search users withour refreshing page */
$(document).ready(function(){
    $("#searchBtn").click(function(){
        let search_user = document.getElementById("search_items").value;
        // alert(search);
         $.ajax({
            type : "POST",
            url : "../controller/search_result.php",
            data: {search_user:search_user},
            success: function(response){
                $(".allResults").html(response);
                $("#dashboard").hide();
            }
        })
        return false;
    })
})
// bulk request for accomodation without refresh
// $(document).ready(function(){
//     $("#request_bulk").click(function(){
//         let requester = document.getElementById("requester").value;
//         let pcn_id = document.getElementById("pcn_id").value;
//         let pcn_id = document.getElementById("user_hotel").value;
//         let pcn_id = document.getElementById("user_room").value;
//         // alert(search);
//          $.ajax({
//             type : "POST",
//             url : "../controller/request_hotel.php",
//             data: {requester:requester, pcn_id:pcn_id, user_hotel:user_hotel, user_room:user_room},
//             success: function(response){
//                 $(".info").html(response);
//                 // $("#dashboard").hide();
//             }
//         })
//         return false;
//     })
// })
/* update profile withour refreshing page */
/* $(document).ready(function(){
    $("#searchBtn").click(function(){
        let search = document.getElementById("search_items").value;

        $.ajax({
            type : "POST",
            url : "../controller/search_result.php",
            data: {search:search},
            success: function(response){
                $(".allResults").html(response);
                $("#dashboard").hide();
            }
        })
        return false;
    })
}) */
/* new way to toggle different menu on the page */
function showPage(page){
    //hide all pages when one displays
    document.getElementById("dashboard").style.display = "none";
    document.querySelectorAll('.displays').forEach(div =>{
        div.style.display = "none";
    });
    document.querySelector(`#${page}`).style.display = "block";
}
//make links clickable to get to its respective page
document.addEventListener("DOMContentLoaded", function(){
    document.querySelectorAll(".page_navs").forEach(navs => {
        navs.onclick = function(){
            showPage(this.dataset.page);
            $("#paid_receipt").hide();
            // document.querySelector(".booth").style.display = "none";

        }
    })
})
// display login on mobile
$(document).ready(function(){
    $("#mobile_log #loginDiv").click(function(){
        $("#mobile_log .login_option").toggle();
        // console.log("Working");
    }); 
});

/* display mobile menu */
$(document).ready(function(){
    $(".menu_icon").click(function(){
        $("#mobile_menu").toggle();
    });
    $("#banner, main, #existence, #hero #mission_vision").click(function(){
        $("#mobile_menu").hide();
        
    })
})
/* toggle inididvual menus */
$(document).ready(function(){
    $(".addMenu").click(function(){
        $(".nav1Menu").toggle();
        $(".nav2Menu").hide();
        // $("#nav3Menu").hide();
        // $("#nav4Menu").hide();
    });
});

$(document).ready(function(){
    $(".addExh").click(function(){
        $(".nav2Menu").toggle();
        $(".nav1Menu").hide();
        // $("#nav3Menu").hide();
        // $("#nav4Menu").hide();
    });
});
/* display mobile menu for backend*/
/* $(document).ready(function(){
    $(".menu_icon").click(function(){
        $("aside").toggle();
    });
    $("#contents").click(function(){
        $("aside").hide();
        
    })
}) */
$(document).ready(function(){
    $(".menu_icon").click(function(){
        $(".mobile_menu").toggle();
    });
    $("#contents").click(function(){
        $(".mobile_menu").hide();
        
    })
})



//display appointment form
$(document).ready(function(){
    $(".appointment").click(function(){
        $(".appointment_page").show();
    });
    $("#close").click(function(){
        $(".appointment_page").hide();
    })
})
//show item information
function showItems(item_id){
    window.open("item_info.php?item="+item_id, "_parent");
    return;
}

//add item to cart
/* $(document).ready(function(){
    $("#add_to_cart").click(function(){
        let cart_item_name = document.getElementById('cart_item_name').value;
        let cart_item_price = document.getElementById('cart_item_price').value;
        let cart_item_restaurant = document.getElementById('cart_item_restaurant').value;
        let customer_email = document.getElementById('customer_email').value;
        
        
        //   alert("work");
        $.ajax({
            type: "POST",
            url: "cart.php",
            data: {cart_item_name:cart_item_name, cart_item_price:cart_item_price, cart_item_restaurant:cart_item_restaurant,customer_email:customer_email},
            success: function(response){
                $(".info").html(response);
            }
        });
        /* $("#itemToDelete").focus();
        $("#itemToDelete").val(''); */
        // return false;
    // })

// }) */

//display update user details by clicking on edit address
$(document).ready(function(){
    $("#editDetails").click(function(){
        // alert('hello');
        $(".update_details").show();
        $(".profile_details").hide();
        $("#close_update").click(function(){
            $(".profile_details").show();
            $(".update_details").hide();
        })
    })
})
//display change password
$(document).ready(function(){
    $("#changePasword").click(function(){
        // alert('hello');
        $(".change_password").toggle();
       
    })
})

/* view slip */
function viewSlip(user){
    window.open("clearance.php?user="+user, "_blank");
    return;
}
/* view exhibitor */
function viewCompany(company){
    window.open("company_details.php?company="+company, "_blank");
    return;
}

//multiply item on shopping cart
/* function getCartTotal(){
    let itemTotal = document.getElementById("itemTotal").innerText;
    let discount = document.getElementById("discount").innerText;
    let delivery = document.getElementById("delivery").innerText;
    let grandTotal = document.getElementById("grandTotal");
    grandTotal.innerText = parseInt(itemTotal) + parseInt(discount) + parseInt(delivery);
    // alert(delivery);
}
getCartTotal();

//delete item from cart
function removeCartItem(cart_id){
    let remove_item = confirm("Do you want to remove this item from cart?");
    if(remove_item){
        window.open('remove_cart_item.php?cart_item='+cart_id, '_parent');
        return;
    }
    
}
 */
//hide suuccess message
// setTimeout()
//get total amount of items in cart
/* function cartItemTotal(){
    let totalPrice = document.querySelectorAll('.totalprice');

} */
// close error pop up box from cart
$(document).ready(function(){
    $("#close_error").click(function(){
        $(".error_box").hide();
    })
})

/* //display featured items on scroll
function displayFeatured(){
    if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100){
        document.getElementById("featured").style.display = "block";
    }else{
        document.getElementById("featured").style.display = "none";
    }
}
//display shop items on scroll
function displayAllItems(){
    if(document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000){
        document.getElementById("all_items").style.display = "block";
    }else{
        document.getElementById("all_items").style.display = "none";
    }
}
//display popular items on scroll
function displayPopular(){
    if(document.body.scrollTop > 500 || document.documentElement.scrollTop > 500){
        document.getElementById("popular").style.display = "block";
    }else{
        document.getElementById("popular").style.display = "none";
    }
}
 */
//display mission and vision on scroll
/* function displayMission(){
    if(document.body.scrollTop > 500 || document.documentElement.scrollTop > 500){
        document.getElementById("mission_vision").style.display = "block";
    }else{
        document.getElementById("mission_vision").style.display = "none";
    }
} */
$("document").ready(function(){
    $(".menu-icon").click(function(){
        $("#navigation").toggle();
    })
})
//display to top button{
function displayTotop(){
    if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100){
        document.querySelector(".toTop").style.display = "block";
    }else{
        document.querySelector(".toTop").style.display = "none";
    }
}

//view notification details
function viewNotification(notify_id){
    window.open("not_details.php?notify_id="+notify_id, "_parent");
    return;
}
/* $(document).ready(function(){
    $("#subscribe").click(function(){
        let subscribe_email = document.getElementById("subscribe_email").value;
        alert(subscribe_email);
        /* $.ajax({
            type: "POST",
            url: "subscribe.php",
            data: {subscribe_email:subscribe_email},
            success: function(response){
                $(".result").html(response);
            }
        }) 
        return false;
    })
    
}) */

/* show registration page on click of not a member */
function showForm(form){
    let pages = document.querySelectorAll(".reg_form form");
    pages.forEach(function(page){
        page.style.display = "none";
    })
    document.querySelector(`#${form}`).style.display = "block";
}
document.addEventListener("DOMContentLoaded", function(){
    let btns = document.querySelectorAll(".btns");
    btns.forEach(function(btn){
        btn.addEventListener("click", function(){
            showForm(this.dataset.form);
        })
    })
})
/* search all members */
$(document).ready(function(){
    let $row = $('#result_table tbody tr');
    $('#searchMenus').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search payment confirmation */
$(document).ready(function(){
    let $row = $('#payment_table tbody tr');
    $('#searchPayments').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search approved members */
$(document).ready(function(){
    let $row = $('#approved_table tbody tr');
    $('#searchApproved').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search accomodation requests */
$(document).ready(function(){
    let $row = $('#hotel_table tbody tr');
    $('#searchHotel').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search accomodation lists with price */
$(document).ready(function(){
    let $row = $('#accomod_table tbody tr');
    $('#searchAccomod').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search item list */
$(document).ready(function(){
    let $row = $('#item_table tbody tr');
    $('#searchItem').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search exhibitors list */
$(document).ready(function(){
    let $row = $('#exh_table tbody tr');
    $('#searchExh').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search confirm exhibitors */
$(document).ready(function(){
    let $row = $('#booth_table tbody tr');
    $('#searchBooths').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search booth list */
$(document).ready(function(){
    let $row = $('#boothList_table tbody tr');
    $('#searchBoothList').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search attendnace */
$(document).ready(function(){
    let $row = $('#attendance_table tbody tr');
    $('#searchAttendance').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search pending orders */
$(document).ready(function(){
    let $row = $('#orderTable tbody tr');
    $('#searchOrder').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search deliveries */
$(document).ready(function(){
    let $row = $('#deliveriesTable tbody tr');
    $('#searchDeliveries').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search delegate hotel requests */
$(document).ready(function(){
    let $row = $('#request_table tbody tr');
    $('#searchRequest').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})

/* search bulk hotel requests */
$(document).ready(function(){
    let $row = $('#bulk_table tbody tr');
    $('#searchBulk').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})

/* approve payments */
function approvePayment(user_id){
    window.open("../controller/approve_payment.php?user="+user_id, "_parent");
    return;
}
/* approve exhibition payments */
function approveExhibitor(exh_id){
    window.open("../controller/approve_exhibitors.php?exhibitor="+exh_id, "_parent");
    return;
}
/* approve exhibition payments */
function declineExhibitor(exh_id){
    window.open("../controller/decline_exhibitors.php?exhibitor="+exh_id, "_parent");
    return;
}
/* approve hotel payment request */
function approveHotel(req_id){
    window.open("../controller/approve_hotel_req.php?request="+req_id, "_parent");
    return;
}
/* decline hotel payment request */
function declineHotel(req_id){
    window.open("../controller/decline_hotel_req.php?request="+req_id, "_parent");
    return;
}
/* approve bulk request for hotel */
function approveBulk(req_id){
    window.open("../controller/approve_bulk_req.php?request="+req_id, "_parent");
    return;
}
/* mark delegate present */
function markPresent(pcn){
    window.open("../controller/mark_present.php?delegate="+pcn, "_parent");
    return;
}
/* dispense item for admin */
function dispenseItem(order_id){
    let dispense = confirm("Are you sure you want to Dispense this item?", "");
    if(dispense){
        window.open("../controller/dispense_item.php?dispense="+order_id, "_parent");
        return;
    }
    
}
//dispense item for users

function dispenseItemUser(order_id){
    let dispense = confirm("Are you sure you want to Dispense this item?", "");
    if(dispense){
        window.open("../controller/dispense_item_users.php?dispense="+order_id, "_parent");
        return;
    }
    
}
//cancel order
function cancelOrder(order_id){
    let cancel = confirm("Are you sure you want to Cancel this order?", "");
    if(cancel){
        window.open("../controller/cancel_order.php?cancel="+order_id, "_parent");
        return;
    }
    
}
//cancel order for users
function cancelOrderUser(order_id){
    let cancel = confirm("Are you sure you want to Cancel this order?", "");
    if(cancel){
        window.open("../controller/cancel_order_user.php?cancel="+order_id, "_parent");
        return;
    }
    
}
/* download members to excel */
$(document).ready(function(){
    
    $("#download_members").click(function(){
        /* alert ("yea"); */
        $("#result_table").table2excel({
            filename: "ACPN_National_conference_Registerd_members.xls"
        });
    })
})
/* download approved members to excel */
$(document).ready(function(){
    
    $("#download_approved").click(function(){
        /* alert ("yea"); */
        $("#payment_table").table2excel({
            filename: "ACPN_National_conference_Approved_members.xls"
        });
    })
})
/* download acoomodation requests to excel */
$(document).ready(function(){
    
    $("#download_accomodation_req").click(function(){
        /* alert ("yea"); */
        $("#hotel_table").table2excel({
            filename: "ACPN_National_conference_hotel_request.xls"
        });
    })
})
/* download attendance list */
$(document).ready(function(){
    
    $("#downloadAttend").click(function(){
        /* alert ("yea"); */
        $("#attendance_table").table2excel({
            filename: "ACPN_National_conference_attendance_list.xls"
        });
    })
})
/* download booth list */
$(document).ready(function(){
    
    $("#download_boothList").click(function(){
        /* alert ("yea"); */
        $("#boothList_table").table2excel({
            filename: "ACPN_National_conference_Booth_list.xls"
        });
    })
})
/* download exhibitors list */
$(document).ready(function(){
    
    $("#download_companies").click(function(){
        /* alert ("yea"); */
        $("#exh_table").table2excel({
            filename: "ACPN_National_conference_Exhibitors_list.xls"
        });
    })
})
/* authentication for whatsa number */
function checkNumber(id){
    if(id.length > 11){
        alert("The Number is too long");
        $(id).focus();
        return;
    }else if(id.length < 11){
        alert("The Number is too shorto");
        $(id).focus();
        return;
    }
}
/* add hotel without refresh */
$(document).ready(function(){
    $("#addHotel").click(function(){
        let hotel = document.getElementById("hotel").value;
        let website = document.getElementById("website").value;
        let hotel_address = document.getElementById("hotel_address").value;
        // alert(hotel_address);
        $.ajax({
            type : "POST",
            url : "../controller/add_hotel.php",
            data : {hotel:hotel, website:website, hotel_address:hotel_address},
            success : function(response){
                $(".info").html(response);
            }
        })
        $("#hotel").val('');
        $("#website").val('');
        $("#hotel_address").val('');
        $("#hotel").focus();
        return false;
    })
})
/* add hall without refresh */
$(document).ready(function(){
    $("#addHall").click(function(){
        let hall = document.getElementById("hall").value;
        // alert(hotel);
        $.ajax({
            type : "POST",
            url : "../controller/add_hall.php",
            data : {hall:hall},
            success : function(response){
                $(".info").html(response);
            }
        })
        $("#hall").val('');
        $("#hall").focus();
        return false;
    })
})
$(document).ready(function(){
    $("#addBooth").click(function(){
        let booth = document.getElementById("booth").value;
        let booth_hall = document.getElementById("booth_hall").value;
        let booth_price = document.getElementById("booth_price").value;
        // alert(hotel);
        $.ajax({
            type : "POST",
            url : "../controller/add_booth.php",
            data : {booth:booth, booth_hall:booth_hall, booth_price:booth_price},
            success : function(response){
                $(".info").html(response);
            }
        })
        $("#booth").val('');
        $("#booth_price").val('');
        $("#booth").focus();
        return false;
    })
})
/* add items to menu without refresh*/
$(document).ready(function(){
    $("#addItem").click(function(){
        let item_name = document.getElementById("item_name").value;
        let item_prize = document.getElementById("item_prize").value;
        let item_category = document.getElementById("item_category").value;
        let company = document.getElementById("company").value;
        // alert(item_name);
        $.ajax({
            type : "POST",
            url : "../controller/add_items.php",
            data : {item_name:item_name, item_prize:item_prize, item_category:item_category, company:company},
            success : function(response){
                $(".info").html(response);
            }
        })
        $("#item_name").val('');
        $("#item_name").focus();
        $("#item_prize").val('');
        return false;
    })
})
/* add rooms to hotel without refresh */
$(document).ready(function(){
    $("#addRoom").click(function(){
        let roomHotel = document.getElementById("roomHotel").value;
        let room = document.getElementById("room").value;
        let price = document.getElementById("price").value;
        let quantity = document.getElementById("quantity").value;
        // alert(roomHotel);
        $.ajax({
            type : "POST",
            url : "../controller/add_room.php",
            data : {roomHotel:roomHotel, room:room, price:price, quantity:quantity},
            success : function(response){
                $(".info").html(response);
            }
        })
        // $("#roomHotel").val('');
        $("#roomhotel").focus();
        $("#room").val('');
        $("#price").val('');
        $("#quantity").val('');
        return false;
    })
})
/* request hotel in bulk without refresh */
$(document).ready(function(){
    $("#request_bulk").click(function(){
        let  bulk_requester= document.getElementById("bulk_requester").value;
        let bulk_delegate = document.getElementById("bulk_delegate").value;
        let user_hotel = document.getElementById("user_hotel").value;
        let user_room = document.getElementById("user_room").value;
        let check_date = document.getElementById("check_date").value;
        let amount = document.getElementById("amount").value;
        // alert(user_room+check_date+user_hotel+bulk_requester+bulk_delegate);
        
        $.ajax({
            type : "POST",
            url : "../controller/request_bulk.php",
            data : {bulk_requester:bulk_requester, bulk_delegate:bulk_delegate, user_hotel:user_hotel, user_room:user_room, check_date:check_date, amount:amount},
            success : function(response){
                $("#requested").html(response);
            }
        })
        // $("#roomHotel").val('');
        $("#user_hotel").focus();
       ;
        // $("#check_in_date").val('');
        return false;
    })
})

/* get rooms from hotel select */
$(document).ready(function(){
    $("#user_hotel").on("change",function(){
        let user_hotel = $(this).val();
        if(user_hotel){
        // alert(user_hotel);
            
            $.ajax({
                type : "POST",
                url : "../controller/get_rooms.php",
                data : {user_hotel:user_hotel},
                success: function(response){
                    $("#user_room").html(response);
                }
            })
            return false;
        }else{
            $("#user_room").html("<option value='' selected>Select hotel first</option>")
        }
    })
})
/* get rooms price from room select */
$(document).ready(function(){
    $("#user_room").on("change",function(){
        let user_room = $(this).val();
        let user_hotel = $("#user_hotel").val();
        if(user_room){
        // alert(user_hotel);
            
            $.ajax({
                type : "POST",
                url : "../controller/get_price.php",
                data : {user_room:user_room, user_hotel:user_hotel},
                success: function(response){
                    $("#price").html(response);
                }
            })
            return false;
        }else{
            $("#price").html("<p>₦ 0.00</p>")
        }
    })
})
/* get booths from hall select */
$(document).ready(function(){
    $("#booth_halls").on("change",function(){
        let booth_halls = $(this).val();
        if(booth_halls){
        // alert(user_hotel);
            
            $.ajax({
                type : "POST",
                url : "../controller/get_booths.php",
                data : {booth_halls:booth_halls},
                success: function(response){
                    $("#booth_id").html(response);
                }
            })
            return false;
        }else{
            $("#booth_id").html("<option value='' selected>Select category first</option>")
        }
    })
})
/* get booths price from hall select */
$(document).ready(function(){
    $("#booth_id").on("change",function(){
        let booth_id = $(this).val();
        let booth_halls = $("#booth_halls").val();

        if(booth_id){
        // alert(booth_halls);
            
            $.ajax({
                type : "POST",
                url : "../controller/get_booth_price.php",
                data : {booth_id:booth_id, booth_halls:booth_halls},
                success: function(response){
                    $("#price").html(response);
                }
            })
            return false;
        }else{
            $("#price").html("<p>Select booth first</p>")
        }
    })
})

/* show exhibition forms */
$(document).ready(function(){
    $("#exhBtn").click(function(){
        // alert("work");
        $("#exhibitors").show();
        $("#delegates").hide();
    })
})
/* show delegate */
$(document).ready(function(){
    $("#deleBtn").click(function(){
        // alert("work");
        $("#exhibitors").hide();
        $("#delegates").show();
    })
})
// alert("hello")

//search deliveries with date for admin
$(document).ready(function(){
    $("#search_date_admin").click(function(){
        let from_date_admin = document.getElementById('from_date_admin').value;
        let to_date_admin = document.getElementById('to_date_admin').value;
        
        //   alert(item + restaurant);
        $.ajax({
            type: "POST",
            url: "../controller/search_date_admin.php",
            data: {from_date_admin:from_date_admin, to_date_admin:to_date_admin},
            success: function(response){
                $(".new_data").html(response);
            }
        });
        /* $("#itemToDelete").focus();
        $("#itemToDelete").val(''); */
        return false;
    })

})
//search deliveries with date for users
$(document).ready(function(){
    $("#search_date").click(function(){
        let from_date = document.getElementById('from_date').value;
        let to_date = document.getElementById('to_date').value;
        
        //   alert(item + restaurant);
        $.ajax({
            type: "POST",
            url: "../controller/search_date.php",
            data: {from_date:from_date, to_date:to_date},
            success: function(response){
                $(".new_data").html(response);
            }
        });
        /* $("#itemToDelete").focus();
        $("#itemToDelete").val(''); */
        return false;
    })

})

//get item name from company select to add to featured
$(document).ready(function(){
    $("#featuredRestaurant").on('change', function(){
        let featuredRestaurant = $(this).val();
        // alert (featured_restaurant);
        if(featuredRestaurant){
            $.ajax({
                type: 'POST',
                url: '../controller/get_featured.php',
                data: {featuredRestaurant:featuredRestaurant},
                success: function(response){
                    $("#featuredItem").html(response);
                }
            })
            return false;
        }else{
            $("#featuredItem").html("<option value=''>Select company first</option>");
        }
    });
});
//add items to featured list without refresh
$(document).ready(function(){
    $("#add_feat").click(function(){
        let featuredRestaurant = document.getElementById('featuredRestaurant').value;
        let featuredItem = document.getElementById('featuredItem').value;
        // alert(featuredItem + featuredRestaurant);
        $.ajax({
            type: "POST",
            url: "../controller/add_featured.php",
            data: {featuredRestaurant:featuredRestaurant, featuredItem:featuredItem},
            success: function(response){
                $("#featuredTable").hide();
                $(".newTable").html(response);
                // $("#item_id").fade();
            }
        })
        $("#featuredItem").val('');
        return false;
    })
    
})
//get item id to remove from featured list
function removeFeatured(id){
    window.open("../controller/remove_featured.php?remove="+id, "_parent");
    return;
}
setTimeout(function(){
    $(".main").show();
    $(".loader").hide();
}, 3000)