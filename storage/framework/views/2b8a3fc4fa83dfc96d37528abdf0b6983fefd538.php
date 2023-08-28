
<?php $__env->startSection('title', 'MXM | Enjoy Shopping!'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">

    <?php if(Session::has('success')): ?>
        <script>
            swal({
                title: "Good job!",
                icon: "success",
                text: "Your information has been updated",
                button: true,
            });
        </script>
    <?php endif; ?>
    
    <div class="row">
        <div class="col-md-10 mt-2 py-3">
            <h6 style="color: black"><a href="/home" style="color: gray">Home</a> > Settings</h6>
        </div>
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-sm btn-warning" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Switch Account</button>
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

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" style="background-color: white" data-class="fixed-left">
        <div class="p-4 pt-5">
          
        <div class="col-md-15 col-md-offset-1">
            <img src="/users/<?php echo e(Auth::user()->uImg); ?>" class="img logo rounded-circle mb-5" style="max-width: 150px; border-radius:50%;">

            
            <form enctype="multipart/form-data" action="<?php echo e(route('update.image')); ?>" method="POST">
   
                <input type="file" name="uImg">
                <br><br>
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="submit" class="btn btn-sm btn-primary">
            </form>
        </div>

        </div>
    </nav>

        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <div class="form-group">
                            <tr>
                                <th scope="col">
                                    <label for="name">Full Name</label>
                                </th>
                                <td>
                                    <?php echo e(Auth::user()->lastname); ?>, <?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->middlename); ?>

                                </td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <th scope="col">
                                    <label for="uBday">Birthday</label>
                                </th>
                                <td>
                                    <?php echo e(Auth::user()->uBday); ?>

                                </td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <th scope="col">
                                    <label for="uGndr">Gender</label>
                                </th>
                                <td>
                                    <?php echo e(Auth::user()->uGndr); ?>

                                </td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <th scope="col">
                                    <label for="uBday">Email</label>
                                </th>
                                <td>
                                    <?php echo e(Auth::user()->email); ?>

                                </td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <th scope="col">
                                    <label for="uGndr">Mobile Number</label>
                                </th>
                                <td>
                                    <?php echo e(Auth::user()->uMob); ?>

                                </td>
                            </tr>
                        </div>

                        <div class="form-group">
                            <tr>
                                <th scope="col">
                                    <label for="address">Address</label>
                                </th>
                                <td><?php echo e(Auth::user()->uHouseNo); ?> <?php echo e(Auth::user()->uStrt); ?>, <?php echo e(Auth::user()->uBrgy); ?>, 
                                    <?php echo e(Auth::user()->uCity); ?>, <?php echo e(Auth::user()->uProv); ?>, <?php echo e(Auth::user()->uZip); ?>

                                </td>
                            </tr>
                        </div>
                    </table>
            
                </div>
            </div>
            <div class="row">
                <div class="col">
                    
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editB">Edit</button>
                    
                </div>
            </div>

            <div class="modal fade" id="editB" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Details</h5>
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
                                        <div class="col">
                                            <table class="table table-striped">
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="lastname">Lastname</label>
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
                                                            <input id="datepicker" class="form-control" name="uBday" placeholder="YYYY-MM-DD" value="<?php echo e(Auth::user()->uBday); ?>" required/>
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
                                                        <td><input type="number" class="form-control" name="uMob" id="uMob"
                                                            value="<?php echo e(Auth::user()->uMob); ?>" required>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <th scope="col">
                                                            <label for="uHouseNo">House No.</label>
                                                        </th>
                                                        <td><input type="number" class="form-control" name="uHouseNo" id="uHouseNo"
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
                                                        <td><input type="number" class="form-control" name="uZip" id="uZip"
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

    </div>
</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\breym\mxm_proj\resources\views/users/settings.blade.php ENDPATH**/ ?>