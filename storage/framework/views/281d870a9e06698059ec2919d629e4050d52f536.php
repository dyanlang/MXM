
<?php $__env->startSection('title', 'MXM | Enjoy Shopping!'); ?>
<?php $__env->startSection('content'); ?>

<?php
use App\Models\Review;

$uID = Auth()->user()->id;
?>

<div class="container">
    <?php if(Session::has('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?> 
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
    <?php endif; ?>

    <?php if(Session::has('sent')): ?>
    <script>
        
    Swal.fire({
  icon: 'success',
  title: 'Review Sent!',
  text: 'Thank you for reviewing our products!',
  confirmButtonColor: '#00FF00',
})
</script>   
    <?php endif; ?>


    <?php if(Session::has('received')): ?>
        <script>
            swal({
                title: "Order Received!",
                icon: "success",
                button: true,
            }) 
            .then(
                function() {
                    window.location.href = "<?php echo e(url('/profile')); ?>";
                }
            );
        </script>
    <?php endif; ?>
    
    <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
        <div class="row">
        <div class="col-md-10 mt-2 py-3">
            <h6 style="color: black"><a href="/home" style="color: gray">Home</a> > Settings</h6>
        </div>
        <div class="col-md-2    ">
            <div class="dropdown">
                <button class="btn btn-sm btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Switch Account</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        
                            <?php if(Auth()->user()->activated_seller == 'x' && Auth()->user()->activated_delman == 'x'): ?>

                                <p class="dropdown-item" style="">No accounts</p>
                                
                            <?php endif; ?>

                            <?php if(Auth()->user()->delman_uReq == '2' && Auth()->user()->activated_delman == 'a'): ?>
                                    
                                <a class="dropdown-item" href="switch_to_delman/<?php echo e(Auth::user()->id); ?>">Switch to Delivery Man</a>

                            <?php endif; ?>

                            <?php if(Auth()->user()->seller_uReq == '4' && Auth()->user()->activated_seller == 'a'): ?>
                                    
                                <a class="dropdown-item" href="switch_to_seller/<?php echo e(Auth::user()->id); ?>">Switch to Seller</a>
                            
                            <?php endif; ?>
                    
                    </div>
            </div>
        </div>
    </div>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                    <div class="p-1">
                        <div class="col-md-15 col-md-offset-1 text-center" style="margin-top: 10%">
                            <center>
                                <img src="/users/<?php echo e(Auth::user()->uImg); ?>" class="img logo mb-5 rounded-circle rounded-circles" width="200" >
                                    <div class="p-image" style="margin-right: 90px; margin-bottom: -1200px;">
                                        <i class="fa fa-camera upload-button" style="140px"  data-toggle="modal" data-target="#exampleModal"></i>
                                            <input class="file-upload" type="file" accept="image/*"/>
                                      </div>
                 
                  
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                 Change your picture
                                    <div class="container">
                                    <form enctype="multipart/form-data" action="<?php echo e(route('update.image')); ?>" method="POST">
                                               <div class="avatar-upload">
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image:  url('/users/<?php echo e(Auth::user()->uImg); ?>') ">
                                                </div>
                                                <br>
                                                <div class="avatar-edit">
                                                    <input type="file" id="imageUpload" name="uImg" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                     <label for="imageUpload"></label>
                                                 </div>
                                                </div>
                                            </div>
                                            <br><br>

                                            <br>
                                            <button type="button" class="btn btn-secondary float-right" data-dismiss="modal" >Cancel</button>

                                            <button type="submit" class="btn btn-sm btn-primary float-right"> Upload </button>
                                        </form>
                 
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </div> 
                            <h3> <?php echo e(Auth::user()->firstname); ?>  <?php echo e(Auth::user()->lastname); ?> </h3>
                            <h6> ADMIN </h6>
                            <h6><?php echo e(Auth::user()->uCity); ?>, <?php echo e(Auth::user()->uProv); ?> </h6>  </center>
                    </div>
                 </div>
            </div>
        </div>          
    </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo e(Auth::user()->lastname); ?>, <?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->middlename); ?>


                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo e(Auth::user()->email); ?>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo e(Auth::user()->uMob); ?>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo e(Auth::user()->uHouseNo); ?> <?php echo e(Auth::user()->uStrt); ?>, <?php echo e(Auth::user()->uBrgy); ?>, 
                                    <?php echo e(Auth::user()->uCity); ?>, <?php echo e(Auth::user()->uProv); ?>, <?php echo e(Auth::user()->uZip); ?>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Birthday</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo e(Auth::user()->uBday); ?>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo e(Auth::user()->uGndr); ?>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                    <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#editB">Edit</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- MODAL -->

            <div class="modal fade" id="editB" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Personal Details </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="container">
                            <form method="POST" action="/user_update/<?php echo e(Auth::user()->id); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col ">
                                            <table class="table">
                                                <div class="form-group">
                                                    <tr >
                                                        <th scope="col">
                                                            <label for="lastname" >Lastname</label>
                                                        </th>
                                                        <td><input type="text" class="form-control" name="lastname" id="lastname"
                                                            value="<?php echo e(Auth::user()->lastname); ?>" required>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="firstname">Firstname</label>
                                                        </th>
                                                        <td><input type="text" class="form-control" name="firstname" id="firstname"
                                                            value="<?php echo e(Auth::user()->firstname); ?>" required>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="middlename">Middlename</label>
                                                        </th>
                                                        <td><input type="text" class="form-control" name="middlename" id="middlename"
                                                            value="<?php echo e(Auth::user()->middlename); ?>">
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="uBday">Birthday</label>
                                                        </th>
                                                        <td>
                                                            <input id="datepicker" type="date" class="form-control" name="uBday" placeholder="YYYY-MM-DD" value="<?php echo e(Auth::user()->uBday); ?>" required/>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="uGndr">Gender</label>
                                                        </th>
                                                        <td>
                                                            <input type="radio" name="uGndr" id="uGndr"
                                                            value="Female" required> Female &nbsp;&nbsp;
                                                            <input type="radio" name="uGndr" id="uGndr"
                                                            value="Male" required> Male
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="uMob">Mobile Number</label>
                                                        </th>
                                                        <td><input type="text" class="form-control" name="uMob" id="uMob"
                                                            value="<?php echo e(Auth::user()->uMob); ?>" required>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="uHouseNo">House No.</label>
                                                        </th>
                                                        <td><input type="text" class="form-control" name="uHouseNo" id="uHouseNo"
                                                            value="<?php echo e(Auth::user()->uHouseNo); ?>" required>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="uStrt">Street</label>
                                                        </th>
                                                        <td><input type="text" class="form-control" name="uStrt" id="uStrt"
                                                            value="<?php echo e(Auth::user()->uStrt); ?>" required>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="uBrgy">Barangay</label>
                                                        </th>
                                                        <td><input type="text" class="form-control" name="uBrgy" id="uBrgy"
                                                            value="<?php echo e(Auth::user()->uBrgy); ?>" required>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="uProv">Province</label>
                                                        </th>
                                                        <td><input type="text" class="form-control" name="uProv" id="uProv"
                                                            value="<?php echo e(Auth::user()->uProv); ?>" required>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="uCity">City</label>
                                                        </th>
                                                        <td><input type="text" class="form-control" name="uCity" id="uCity"
                                                            value="<?php echo e(Auth::user()->uCity); ?>" required>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="uZip">Zip Code</label>
                                                        </th>
                                                        <td><input type="text" class="form-control" name="uZip" id="uZip"
                                                            value="<?php echo e(Auth::user()->uZip); ?>" required>
                                                        </td>
                                                    </tr>
                                                </div>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div> 
        </div>
            
<!-- Nav tab -->

<div class="row bg-white card py-3">
    <div class="container">
        
    <!-- Tabs navs -->
  
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#topay" class="nav-link active" data-toggle="tab" style="color: green; text-align: center">
                <?php if($topay > 0): ?>
                    To Pay (<?php echo e($topay); ?>)
                <?php else: ?>
                    To Pay
                <?php endif; ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="#toship" class="nav-link" data-toggle="tab" style="color: green; text-align: center">
                <?php if($toship > 0): ?>
                    To Ship (<?php echo e($toship); ?>)
                <?php else: ?>
                    To Ship
                <?php endif; ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="#toreceive" class="nav-link" data-toggle="tab" style="color: green; text-align: center">
                <?php if($toreceive > 0): ?>
                    To Receive (<?php echo e($toreceive); ?>)
                <?php else: ?>
                    To Receive
                <?php endif; ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="#completed" class="nav-link" data-toggle="tab" style="color: green; text-align: center">Completed</a>
        </li>
        <li class="nav-item">
            <a href="#cancelled" class="nav-link" data-toggle="tab" style="color: green; text-align: center">Cancelled</a>
        </li>
        <li class="nav-item">
            <a href="#returned" class="nav-link" data-toggle="tab" style="color: green; text-align: center">Return/Refund</a>
        </li>
    </ul>
    <!-- Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content">

        <div class="tab-pane fade show active" id="topay">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($order->oStat == 'p'): ?>
                    <div class="container mt-3 mb-3">
                        <div class="d-flex justify-content-center row">   
                            <div class="col-md-10">
                                <div class="row bg-white border rounded">
                                    <a href="/view_parcel/<?php echo e($order->oID); ?>" class="d-flex justify-content-center row"> 
                                        <div class="col-md-3 mt-4">
                                            <center>
                                                <img class="img-fluid img-responsive rounded product-image" src="products/<?php echo e($order->pdImg); ?>"> 
                                            </center>
                                        </div>
                                                <div class="col-md-6 mt-1">
                                                <h6 style="padding-top: 3%; color: black"><b><?php echo e($order->pdNam); ?></b></h6>
                                            
                                                <div class="mt-1 mb-1 spec-1" style="color: gray">Variation : <?php echo e($order->pdVar); ?></div>
                                                <p class="para" style="color: black;">x<?php echo e($order->oQty); ?></p>
                                                <p class="para" style="color: black; padding-top: 5%"> Price : ₱ <?php echo e($order->pdPrc); ?></p> 
                                            </div>
                                            <div class="align-items-center align-content-center col-md-3 border-left mt-3">         <?php $total1 = 0 ?>

                                                <div class="d-flex flex-row align-items-center">   <?php $total1 += $order->pdPrc * $order->oQty ?> 
                                                    <p style="color: black; font-size: 15px">Order Total : ₱ <?php echo e($total1); ?></p>
                                                </div>
                                         

<?php

$view = Review::where('oID', $order->oID )
            ->where('uID', $uID)
            ->where('rtype', '0')
            ->count('rID'); 

?>    
<!---- MODAL --->

<?php if( $view  == 0): ?>

<button class="btn btn-secondary "  data-toggle="modal" data-target="#example<?php echo e($order->oID); ?>">Cancel Product </button>  


<div class="cart-modal modal fade" id="example<?php echo e($order->oID); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title" id="exampleModalLabel<?php echo e($order->pID); ?>"> Cancel product: </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &times;</span></button>
                </div>
                    <div class="modal-body">
                        <form method="GET" action="<?php echo e(route('review', $order->oID )); ?>">
                            <div class="form-group">
                                <div class="border border-warning -md-3 mt-4 "> <center> <br>
                                    <i style="font-size:19px"   class="fa text text-warning">&#xf071;</i> <p class=" text text-warning">Please select cancellation reason. Please take note that your cancellation will be subject to the seller's approval as the order is currently being processed. </p></center><br>
                                </div>

                                <br>
                                <div class="input-group input-group-lg"> 
                                <select  name="review" class="form-select" aria-label="Default select example">
                                    <option name="review" selected> Select Cancellation Reason</option>
                                    <option name="review" value=" Need to change delivery address"> Need to change delivery address </option>
                                    <option name="review" value=" Seller is not responsive to my inquiries"> Seller is not responsive to my inquiries </option>
                                    <option name="review" value=" Modify existing order (color, size, etc.)">   Modify existing order (color, size, etc.) </option>
                                    <option name="review" value=" Others / change of mind">  Others / change of mind </option>
                                </select>
                                </div>
                        </div>
                    </div>
                                <input type="hidden" class="form-control"  value="<?php echo e($order->oID); ?>"  readonly > 
                                <input type="hidden" class="form-control" name="rtype"  value="0"  readonly > 
                                <input type="hidden" class="form-control"  value="<?php echo e($order->uID); ?>"  readonly > 

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button> </form>
                    </div>
            </div>
        </div>
    </div>

   
<?php endif; ?>

<?php if( $view > 0): ?>
</a>
<button class="btn btn-secondary "  disabled > Cancel Product </button>

<?php endif; ?> 
                  

     
                                            <input type="hidden" value="<?php echo e($order->uID); ?>">
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?> 

                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($topay < 1): ?>
                <div class="container" style="margin-top: 5%">
                    <center>
                        <h5 style="color: green; filter: opacity(45%);"><b>No orders yet</b></h5>
                        <br>
                        <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
                    </center>
                </div>
            <?php endif; ?>
        </div>

        <div class="tab-pane fade show" id="toship">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($order->oStat == 's' || $order->oStat == 'w'): ?>
                    <div class="container mt-3 mb-3">
                        <div class="d-flex justify-content-center row">
                            <a href="/view_parcel/<?php echo e($order->oID); ?>" class="d-flex justify-content-center row"> 
                                <div class="col-md-10">
                                    <div class="row bg-white border rounded">
                                        <div class="col-md-3 mt-4"><center><img class="img-fluid img-responsive rounded product-image" src="products/<?php echo e($order->pdImg); ?>"></center></div>
                                            <div class="col-md-6 mt-1">
                                                <h6 style="padding-top: 3%; color: black"><b><?php echo e($order->pdNam); ?></b></h6>
                                            
                                                <div class="mt-1 mb-1 spec-1" style="color: gray">Variation : <?php echo e($order->oVar); ?></div>
                                                <p class="para" style="color: black;">x<?php echo e($order->oQty); ?></p>
                                                <p class="para" style="color: black; padding-top: 3%"> Price : ₱ <?php echo e($order->pdPrc); ?></p>
                                                
                                                <?php if($order->oStat == 'w'): ?>
                                                    <p class="text-success" style="font-size: 11px;">Sender is preparing to ship your parcel</p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="align-items-center align-content-center col-md-3 border-left mt-3">
                                                <div class="d-flex flex-row align-items-center">
                                                    <p style="color: black; font-size: 15px">Order Total : ₱ <?php echo e($order->oTol); ?></p>
                                                </div>
                                                <p class="text-success" style="font-size: 14px">Shipping Total : ₱ </p>

                                            </div>

                                            <input type="hidden" value="<?php echo e($order->uID); ?>">
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($toship < 1): ?>
                <div class="container" style="margin-top: 5%">
                    <center>
                        <h5 style="color: green; filter: opacity(45%);"><b>No orders yet</b></h5>
                        <br>
                        <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
                    </center>
                </div>
            <?php endif; ?>
        </div>

        <div class="tab-pane fade show" id="toreceive">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($order->oStat == 'r'): ?>

                    <div class="container mt-3 mb-3">
                        <div class="d-flex justify-content-center row">
                           
                                <div class="col-md-10">
                                    <div class="row bg-white border rounded">
                                        <div class="col-md-3 mt-4"><center>  <a href="/view_parcel/<?php echo e($order->oID); ?>" class="d-flex justify-content-center row"> <img class="img-fluid img-responsive rounded product-image" src="products/<?php echo e($order->pdImg); ?>"></a></center></div>
                                            <div class="col-md-6 mt-1">  <a href="/view_parcel/<?php echo e($order->oID); ?>" class="d-flex justify-content-center row"> 
                                                <h6 style="padding-top: 3%; color: black"><b><?php echo e($order->pdNam); ?></b></h6>
                                                <div class="mt-1 mb-1 spec-1" style="color: gray">Variation : <?php echo e($order->oVar); ?></div>
                                                <p class="para" style="color: black;">x<?php echo e($order->oQty); ?></p>
                                                <p class="para" style="color: black; padding-top: 3%"> Price : ₱ <?php echo e($order->pdPrc); ?></p>
                                                <p class="text-success" style="font-size: 11px;"> </p>
                                             </a></div>
                                            <div class="align-items-center align-content-center col-md-3 border-left mt-3">
                                                <div class="d-flex flex-row align-items-center">
                                                    <p style="color: black; font-size: 15px">Order Total : ₱ <?php echo e($order->oTol); ?></p>
                                                </div>
                                                <p class="text-success" style="font-size: 14px">Shipping Total : ₱ </p>

                                                 <?php if($order->dAct == 'd'): ?>
                                                 <form method="GET" action="<?php echo e(route('order_received', $order->oID )); ?>">

                                                <button class="btn btn-secondary "  > Received Product </button>

                                                <input type="hidden" value="<?php echo e($order->uID); ?>">
                                                </form>
                                                <?php else: ?>
                                                    <center>
                                                        <button type="button" class="btn btn-secondary" disabled>Order Received</button>
                                                    </center>
                                                <?php endif; ?>
                                            </div>
                                           
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                    </div>

                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($toreceive < 1): ?>
                <div class="container" style="margin-top: 5%">
                    <center>
                        <h5 style="color: green; filter: opacity(45%);"><b>No orders yet</b></h5>
                        <br>
                        <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
                    </center>
                </div>
            <?php endif; ?>
        </div>


        <div class="tab-pane fade show" id="completed">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
                <?php if($order->oStat == 'c'): ?>
                    <div class="container mt-3 mb-3">
                        <div class="d-flex justify-content-center row">
                                <div class="col-md-10">
                                    <div class="row bg-white border rounded">
                                        <div class="col-md-3 mt-4"><center> <a href="/view_parcel/<?php echo e($order->oID); ?>"><img class="img-fluid img-responsive rounded product-image" src="products/<?php echo e($order->pdImg); ?>"></a></center></div>
                                        <div class="col-md-6 mt-1">   <a href="/view_parcel/<?php echo e($order->oID); ?>"> 
                                            <h6 style="padding-top: 3%; color: black"><b><?php echo e($order->pdNam); ?></b></h6>
                                            
                                                <div class="mt-1 mb-1 spec-1" style="color: gray">Variation : <?php echo e($order->oVar); ?></div>
                                                <p class="para" style="color: black;">x<?php echo e($order->oQty); ?></p>
                                                <p class="para" style="color: black; padding-top: 3%"> Price : ₱ <?php echo e($order->pdPrc); ?></p>
                                                <p class="text-success" style="font-size: 11px;">Parcel has been delivered</p>
                                                </a>   </div> 
                                            <div class="align-items-center align-content-center col-md-3 border-left mt-3">
                                                <div class="d-flex flex-row align-items-center">
                                                    <p id="view" >Order Total : ₱ <?php echo e($order->oTol); ?></p>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                    <p id="view" > Shipping Total : ₱  </p> 
                                                    </div>
                                            
                                              
<?php
$view = Review::where('oID', $order->oID )
            ->where('uID', $uID)
            ->where('rtype', 'x')
            ->count('rating'); 

?>
        
<!---- MODAL --->

<?php if( $view  == 0): ?>
 <button class="btn btn-secondary "  data-toggle="modal" data-target="#exampleModal<?php echo e($order->oID); ?>"><?php echo e($order->oID); ?> Review Product </button>    
 <div class="cart-modal modal fade" id="exampleModal<?php echo e($order->oID); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel<?php echo e($order->pID); ?>"> Review product: </h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &times;</span></button>
                </div>
                <div class="modal-body">
                     <form method="GET" action="<?php echo e(route('review', $order->oID )); ?>">
                            <div class="form-group">
                                <div id="full-stars-example">
                                    <div class="rating-group">
                                        <p id="view" > Rate Product: </p>
                                        <center>
                                            <input class="rating__input rating__input--none" name="rating" id="rating-none" value="0" type="radio" checked >
                                            <label aria-label="1 star" class="rating__label" for="rating-1"><i class="rating__icon rating__icon--star fa fa-star"></i><br></label>
                                            <input class="rating__input" name="rating" id="rating-1" value="1" type="radio">
                                            <label aria-label="2 stars" class="rating__label" for="rating-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating" id="rating-2" value="2" type="radio">
                                            <label aria-label="3 stars" class="rating__label" for="rating-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating" id="rating-3" value="3" type="radio" >
                                            <label aria-label="4 stars" class="rating__label" for="rating-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating" id="rating-4" value="4" type="radio">
                                            <label aria-label="5 stars" class="rating__label" for="rating-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating" id="rating-5" value="5" type="radio">
                                            <div class="text-secondary" style="font-weight: lighter"> <h>  very bad   </h>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
                                            &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp
                                            <h> very good  </h>  </div>
                                          
                                        </center>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="container">
                        <div class="form-group">
                            <label for="message-text"  id="view" class="col-form-label"> Write review:</label>
                            <textarea class="form-control msg-content" name="review" id="message-text"></textarea>
                        </div> 

                        </div>
                  
                
                        <input type="hidden" class="pro_id  form-control"   name="oID" value="<?php echo e($order->oID); ?>"  readonly > 
                        <input type="hidden" class="rtype  form-control" name="rtype"  value="x"  readonly > 

                        <input type="hidden" class="sID  form-control"  name="sID"  value="<?php echo e($order->sID); ?>"  readonly > 
                        <input type="hidden" class="pID  form-control" name="pID"  value="<?php echo e($order->pID); ?>"  readonly > 

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary chatBTN">Save</button> 
                    </div>
        </form>
        </div>    </div>
            </div>
        </div>
<?php endif; ?>
    
<?php if( $view > 0): ?>

<button class="btn btn-secondary "  disabled > Review Product </button>

<?php endif; ?> 
                                  
<input type="hidden" value="<?php echo e($order->uID); ?>">
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?> 
      
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($completed < 1): ?>
        <div class="container" style="margin-top: 5%">
            <center>
                <h5 style="color: green; filter: opacity(45%);"><b>No orders yet</b></h5>
                <br>
                <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
            </center>
        </div>
    <?php endif; ?>
</div>

        <div class="tab-pane fade show" id="cancelled">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($order->oStat == 'z'): ?>
                    <div class="container mt-3 mb-3">
                        <div class="d-flex justify-content-center row">
                            <a href="/view_parcel/<?php echo e($order->oID); ?>" class="d-flex justify-content-center row">
                                <div class="col-md-10">
                                    <div class="row bg-white border rounded">
                                        <div class="col-md-3 mt-4"><center><img class="img-fluid img-responsive rounded product-image" src="products/<?php echo e($order->pdImg); ?>"></center></div>
                                            <div class="col-md-6 mt-1">
                                                <h6 style="padding-top: 3%; color: black"><b><?php echo e($order->pdNam); ?></b></h6>
                                            
                                                <div class="mt-1 mb-1 spec-1" style="color: gray">Variation : <?php echo e($order->oVar); ?></div>
                                                <p class="para" style="color: black;">x<?php echo e($order->oQty); ?></p>
                                                <p class="para" style="color: black; padding-top: 5%"> Price : ₱ <?php echo e($order->pdPrc); ?></p>
                                            </div>
                                            <div class="align-items-center align-content-center col-md-3 border-left mt-3">
                                                <div class="d-flex flex-row align-items-center">
                                                    <p style="color: black; font-size: 15px">Order Total : ₱ <?php echo e($order->oTol); ?></p>
                                                </div>
                                                <p class="text-success" style="font-size: 14px">Shipping Total : ₱ </p>
                                            </div>

                                            <input type="hidden" value="<?php echo e($order->uID); ?>">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($cancelled < 1): ?>
                <div class="container" style="margin-top: 5%">
                    <center>
                        <h5 style="color: green; filter: opacity(45%);"><b>No orders yet</b></h5>
                        <br>
                        <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
                    </center>
                </div>
            <?php endif; ?>
        </div>

        <div class="tab-pane fade show" id="returned">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($order->oStat == 'f'): ?>
                    <div class="container mt-3 mb-3">
                        <div class="d-flex justify-content-center row">
                            <a href="/view_parcel/<?php echo e($order->oID); ?>" class="d-flex justify-content-center row">
                                <div class="col-md-10">
                                    <div class="row bg-white border rounded">
                                        <div class="col-md-3 mt-4"><center><img class="img-fluid img-responsive rounded product-image" src="products/<?php echo e($order->pdImg); ?>"></center></div>
                                            <div class="col-md-6 mt-1">
                                                <h6 style="padding-top: 3%; color: black"><b><?php echo e($order->pdNam); ?></b></h6>
                                            
                                                <div class="mt-1 mb-1 spec-1" style="color: gray">Variation : <?php echo e($order->oVar); ?></div>
                                                <p class="para" style="color: black;">x<?php echo e($order->oQty); ?></p>
                                                <p class="para" style="color: black; padding-top: 5%"> Price : ₱ <?php echo e($order->pdPrc); ?></p>
                                            </div>
                                            <div class="align-items-center align-content-center col-md-3 border-left mt-3">
                                                <div class="d-flex flex-row align-items-center">
                                                    <p style="color: black; font-size: 15px">Order Total : ₱ <?php echo e($order->oTol); ?></p>
                                                </div>
                                                <p class="text-success" style="font-size: 14px">Free shipping</p>
                                            </div>

                                            <input type="hidden" value="<?php echo e($order->uID); ?>">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($returned < 1): ?>
                <div class="container" style="margin-top: 5%">
                    <center>
                        <h5 style="color: green; filter: opacity(45%);"><b>No returned orders yet</b></h5>
                        <br>
                        <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
                    </center>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
    <!-- Tabs content -->
</div>

<div class="container">

<div class="footer">

<br><br>
</div>

</div>
    </div>


    
<script type="text/javascript">
 
    
 function readURL(input) {
 if (input.files && input.files[0]) {
     var reader = new FileReader();
     reader.onload = function(e) {
         $('#imagePreview').css('background-image', 'url('+e.target.result +')');
         $('#imagePreview').hide();
         $('#imagePreview').fadeIn(650);
     }
     reader.readAsDataURL(input.files[0]);
 }else{
    location.load();
 }
}
$("#imageUpload").change(function() {
 readURL(this);
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jelai\mxm_proj\resources\views/users/profile.blade.php ENDPATH**/ ?>