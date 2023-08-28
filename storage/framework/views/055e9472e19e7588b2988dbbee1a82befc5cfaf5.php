<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <link rel="icon" type="image/png" sizes="96x96" href="/logo/MXM-GreenLogo.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Scripts -->
            <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
         
    <!-- JQUERY -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
            <script src="/cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js"></script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


    <!-- SWEET ALERTS -->
         
            <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/regular.min.css">
    <!-- STYLE -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="<?php echo e(asset ('css/style.css')); ?>" rel="stylesheet">
            <link href="<?php echo e(asset ('scss/style.scss')); ?>" rel="stylesheet">
            <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.2/flickity.min.css">
           
<style>

        .dropdown-menu{
            overflow-x: none;
        }
        /* --------- */
        .dropdown:hover>.dropdown-menu {
        display: block;

        }

        .dropdown>.dropdown-toggle:active {
        /*Without this, clicking will make it sticky*/
            pointer-events: none;
        }
        body{
            background: #F7F8F7 }

</style>
</head>
<body>  
    
<?php

use App\Models\Message;
use App\Models\User;
 use App\Models\Order;
    $x = "x";

    $uID = Auth()->user()->id;
    $carts = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
            ->where('order_tb.oStat', $x)
            ->where('order_tb.uID', $uID)
            ->get(['order_tb.oQty', 'prdt_tb.*']);

    $x = "x";

    $uID = Auth()->user()->id;
    
    
            
    $user = User::get()->except(Auth::id());

    
    $chat = User::join('mes_tb', 'mes_tb.sID', '=', 'users_tb.id')
            ->groupby('sID')
            ->latest()
            ->get()->except(Auth::id());

 ?>

 <a id="button"></a>

 
<div class="dropdown " >
    <!-- Page Wrapper -->
     <div id="wrapper " >
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" >
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light  mb-4 static-top shadow" style=" padding: 20px; background-color: #00FF00">
                    <a href="/home">  <img src= "/logo/MXM-WhiteLogo.png" style="display: inline-block; height: 59px; " class=" ml-4"/>  
                      <span class="mr-2  d-none d-lg-inline text-white" style="color:white; font-size: 18pt;  text-transform: uppercase; ">  MXM | SHOP NOW! </span> </a> 
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link " href="#" id="alertsDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-white" href="#" style=" text-transform: uppercase; font-size:13pt; color:white" role="button"  aria-haspopup="true" aria-expanded="false"><?php echo e(__('Be with MXM!'  )); ?> </span>
                        <!-- Dropdown  -->

                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <h6 class="text-dark"> <b> What's the offer ? </b></h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <?php if(Auth()->user()->seller_uReq == '4'): ?>
                                        <a style="color: gray;"> &nbsp; <i class="fa fa-user"></i> &nbsp; <?php echo e(__('Become a Seller')); ?></a> <br>   
                                    <?php elseif(Auth()->user()->seller_uReq == '0' || Auth()->user()->seller_uReq == '3'): ?>
                                        <a class="dropdown-item" href="<?php echo e(url('/become_seller')); ?>">&nbsp; <i class="fa fa-user"></i> &nbsp; <?php echo e(__('Become a Seller')); ?> </a>
                                    <?php endif; ?>
                                    <?php if(Auth()->user()->delman_uReq == '2'): ?>
                                        <a style="color: gray;"><i class="fa fa-motorcycle"></i> &nbsp; <?php echo e(__('Become a Delivery Man')); ?></a>
                                    <?php elseif(Auth()->user()->delman_uReq == '0' || Auth()->user()->delman_uReq == '1'): ?>
                                        <a class="dropdown-item" href="<?php echo e(url('/become_delivery_man')); ?>">&nbsp; <i class="fa fa-motorcycle"></i> &nbsp; <?php echo e(__('Become a Delivery Man')); ?></a>
                                    <?php endif; ?>
                                </a>
                        </div>
                </li>
                <!-- Topbar Search -->
                <li>
                    <form action="<?php echo e(url('/search_products')); ?>" enctype="multipart/form-data"  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="bg-light rounded rounded-pill  mx-1 m-2" >
                            <div class="input-group">
                                <input type="search"  name="search" placeholder="What are you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light  rounded rounded-pill">
                                    <div class="">
                                        <li id="button-addon1"  type="submit" class="btn btn-sm  text-success"><i class="fa fa-search"></i></li>
                                    </div>
                            </div>
                        </div>
                    </form>
                </li>
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link" href="#" id="searchDropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw text-white"  style=" font-size:20px; color:white"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div  action="<?php echo e(url('/search_products')); ?>" class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                            <form class=" mr-auto  ">
                                <div class="bg-light rounded rounded-pill">
                                    <div class="input-group">
                                        <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light  rounded rounded-pill">
                                            <div class="">
                                                <li id="button-addon1" type="submit" class="btn btn-sm  text-success"><i class="fa fa-search"></i></li>
                                            </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </li>

    <!--- CARTS --->
    <?php $total = 0 ?>
    <?php  
    foreach($carts as $t){
        {{   $total += $t->pdPrc * $t->oQty; }}
    }   
    ?>
                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link " href="<?php echo e(route('carts')); ?>" id="alertsDropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-cart-shopping" style=" font-size:20px; color:white" aria-hidden="true"> </i>      
                        <!-- Counter - Alerts -->
                        <span class="badge badge-counter badge-danger cart-count ">0</span> 
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown ">
                        <h6 class="dropdown text-dark">
                            <i class="fa-solid fa-cart-shopping"></i> Cart
                            <span class="float-right"> Total: <span class="text-info"> ₱ <?php echo e($total); ?> </span> </span>
                        </h6>
                        <div class="row cart-detail" style="overflow-y: scroll;  text-align: left;">
                                <table class="table table-hover table-condensed" id="cart">
                                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>  <img  src=" <?php echo e(URL::asset('/products/'.$cart->pdImg  )); ?> "  width="50" height="50" class="img-responsive"/> </td>
                                            <td>  <span class="price text-dark"> ₱   <?php echo e($cart->pdPrc); ?> </span> </td>
                                            <td>  <span class="price text-dark"> <?php echo e($cart->oQty); ?> </span> </td>
                                            <td> <span class=" price text-dark text-center">  <?php echo e($cart->pdNam); ?>  </span>  </td>
                                        </tr>     
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                </table> 
                        </div>  
                    </div>     
                 
                </li>

        <!----- CHAT ---> 

 <?php



$uID = Auth()->user()->id;       
$user = User::get()->except(Auth::id());
$chat = User::join('mes_tb', 'mes_tb.sID', '=', 'users_tb.id')
        ->groupby('sID')
        ->latest()
        ->get()->except(Auth::id());

?>


                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link " href="#" id="alertsDropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <i class='fa-solid fa-comment' style=" font-size:20px; color:white" aria-hidden="true"> </i> 
                            <span class="badge badge-counter badge-danger chat-count ">0</span>
                        <!-- Counter - Messages -->
                      
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown text-dark">
                           <i class="fa-solid fa-comment"></i> Message  
                        </h6>
                        <div class="row chat-detail" style="overflow-y: scroll; max-height: 300px; text-align: left;">
                                <table class="table table-hover table-condensed">
                                    <?php $__currentLoopData = $chat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      
                                        <tr>
                                        <?php if($chats->mRead == '1'): ?>
       
                                            <td style=" margin-right: -2px; margin-left: -200px;"> <img  src=" <?php echo e(URL::asset('/users/'.$chats->uImg )); ?> " style=" display: block; margin-top: 5px;" width="50" height="50" class="img-responsive"/> </td>
                                            <td>  
                                                    <p style="  margin-bottom: -2px; font-weight: lighter" class="text-dark text-left" >    <?php echo e($chats->username); ?>  </p> 
                                            
                                                    <p style="font-size: 9pt; color: lightgray; font-weight: lighter; max-width: 100px;" class="inline-block text-truncate" > 
                                                    <span class=" text-primary text-truncate">    <?php echo e($chats->mCon); ?> </span> </p> 
                                            </td>
                                             <td>  <span class="name " ><p class="text-end" style="font-size: 8pt; color: lightgray; margin-bottom: -1px;">   <?php echo e($chats->mDate); ?> </p>  </td>
                                    
                                       
                                             <?php else: ?>
                                             <td style="margin-right: -2px; margin-left: -200px;"> <img  src=" <?php echo e(URL::asset('/users/'.$chats->uImg  )); ?> " style=" display: block; margin-top: 5px;" width="50" height="50" class="img-responsive"/> </td>
                                            <td> 
                                             <p style=" margin-bottom: -2px; font-weight: lighter" class=" text-left" >    <?php echo e($chats->username); ?>  </p> 
                                         
                                             <p style="font-size: 9pt; color: gray; font-weight: lighter; max-width: 100px;" class="inline-block text-truncate" > 
                                             <?php echo e($chats->mCon); ?></p>  </span> </td>
                                             <td> </td>
                                             <td>  <span class="name " ><p class="text-end" style="font-size: 8pt; color: lightgray; margin-bottom: -1px;">   <?php echo e($chats->mDate); ?> </p>  </td>
                                         <?php endif; ?>
                                        </tr>     
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                </table>   
                            </div>  
                        </div>
                    </li>
           
                 <!---   PROFILE / SETTING/ PURCHASE HISTORY/ LOGOUT --> 

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link " href="#" id="alertsDropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">
                     
                            <img class="img-profile rounded-circle" height="40px"  src=" <?php echo e(URL::asset('/users/'. Auth::user()->uImg  )); ?> " >
                            <span class="mr-2 d-none d-lg-inline text-white" style="font-size: 12pt"><?php echo e(Auth::user()->username); ?></span>

                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu pro dropdown-menu-left" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="<?php echo e(url('/settings')); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            <?php echo e(__('My Profile')); ?>                        </a>
                        <a class="dropdown-item" href="<?php echo e(url('/profile')); ?>">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            <?php echo e(__('Purchase History')); ?>

                        </a>
                       
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" data-toggle="modal" data-target="#logoutModal"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            <?php echo e(__('Logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

            <main class="" >
                    <div class="container">
                
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                        </div> 
                    <?php endif; ?>
                </div>
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div> 
</div>


<script>
    
$(document).ready(function () {
    
    loadcart();
    loadchat();
    $('#cart').load(location.href+(' #cart'));
    


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

function loadcart(){

    $.ajax({
        type: "GET", 
        url: "/load-cart-data",
        success: function(response){
            $('.cart-count').html('');
            $('.cart-count').html(response.count);
        }

    });

}


function loadchat(){

$.ajax({
    type: "GET", 
    url: "/load-chat-data",
    success: function(response){
        $('.chat-count').html('');
        $('.chat-count').html(response.count);
    }

});

}


});

</script>

<script>

var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});


</script>

<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/popper.js')); ?> "></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?> "></script>
<script src="<?php echo e(asset('js/main.js')); ?> "></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php /**PATH C:\Users\jelai\mxm_proj\resources\views/layouts/search-layout.blade.php ENDPATH**/ ?>