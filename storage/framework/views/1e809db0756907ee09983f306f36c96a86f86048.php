
<?php $__env->startSection('title', 'MXM | Enjoy Shopping!'); ?>
<?php $__env->startSection('content'); ?>

<div class="container-profile">

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


  


    <div class="row ">
        <div class="col-md-12 mt-2 py-3">
            <h6 style="color: black"><a href="/home" >Home</a> / <span style="color: gray">  User Profile </span></h6>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-4 m-1 bg-white">
            <div class="p-1">
                <div class="col-md-15 col-md-offset-1 text-center" style="margin-top: 10%">
                    <center><img src="/users/<?php echo e(Auth::user()->uImg); ?>" class="img logo mb-5" style="height: 180px; width: 180px; ">
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
                                        <form enctype="multipart/form-data" action="<?php echo e(route('update_image')); ?>" method="POST">
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
                                            <button type="btn" class="btn btn-sm btn-secondary float-right"> Cancel </button>

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

        <div class="col-md-7 m-1 ml-3 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col  m-1 bg-white" >
                        <table class="table ">
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
                                        <label for="uMob">Mobile Number</label>
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
                        <div class="form-group float-right" style="margin-top: 7px;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
EDIT
</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

 

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"> Your Profile Info </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body   text-dark">
                    <form method="POST" action="/ad_update/<?php echo e(Auth::user()->id); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                            <div class="row   text-dark">
                                <div class="col">
                                    <table class="table table-borderless text-dark ">
                                        <div class="form-group " >
                                            <tr >
                                                <th scope="col">
                                                    <label class="text-dark" for="lastname">Lastname</label>
                                                </th>
                                                <td><input type="text" class="form-control  text-dark  text-dark  text-dark" name="lastname" id="lastname"
                                                    value="<?php echo e(Auth::user()->lastname); ?>" required>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <th scope="col">
                                                    <label class="text-dark" for="firstname">Firstname</label class="text-dark">
                                                </th>
                                                <td><input type="text" class="form-control  text-dark  text-dark" name="firstname" id="firstname"
                                                    value="<?php echo e(Auth::user()->firstname); ?>" required>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <th scope="col">
                                                    <label class="text-dark" for="middlename">Middlename</label>
                                                </th>
                                                <td><input type="text" class="form-control  text-dark  text-dark" name="middlename" id="middlename"
                                                    value="<?php echo e(Auth::user()->middlename); ?>">
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <th scope="col">
                                                    <label class="text-dark" for="uBday">Birthday</label>
                                                </th>
                                                <td>
                                                    <input id="datepicker" class="form-control  text-dark  text-dark" name="uBday" placeholder="YYYY-MM-DD" value="<?php echo e(Auth::user()->uBday); ?>" required/>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <th scope="col">
                                                    <label class="text-dark" for="uGndr">Gender</label>
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
                                                    <label class="text-dark" for="uMob">Mobile Number</label>
                                                </th>
                                                <td><input type="number" class="form-control  text-dark" name="uMob" id="uMob"
                                                    value="<?php echo e(Auth::user()->uMob); ?>" required>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <th scope="col">
                                                    <label class="text-dark" for="uHouseNo">House No.</label class="text-dark">
                                                </th>
                                                <td><input type="number" class="form-control  text-dark" name="uHouseNo" id="uHouseNo"
                                                    value="<?php echo e(Auth::user()->uHouseNo); ?>" required>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <th scope="col">
                                                    <label class="text-dark" for="uStrt">Street</label class="text-dark">
                                                </th>
                                                <td><input type="text" class="form-control  text-dark" name="uStrt" id="uStrt"
                                                    value="<?php echo e(Auth::user()->uStrt); ?>" required>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <th scope="col">
                                                    <label class="text-dark" for="uBrgy">Barangay</label class="text-dark">
                                                </th>
                                                <td><input type="text" class="form-control  text-dark" name="uBrgy" id="uBrgy"
                                                    value="<?php echo e(Auth::user()->uBrgy); ?>" required>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <th scope="col">
                                                    <label class="text-dark" for="uProv">Province</label class="text-dark">
                                                </th>
                                                <td><input type="text" class="form-control  text-dark" name="uProv" id="uProv"
                                                    value="<?php echo e(Auth::user()->uProv); ?>" required>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <th scope="col">
                                                    <label class="text-dark" for="uCity">City</label class="text-dark">
                                                </th>
                                                <td><input type="text" class="form-control  text-dark" name="uCity" id="uCity"
                                                    value="<?php echo e(Auth::user()->uCity); ?>" required>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <th scope="col">
                                                    <label class="text-dark" for="uZip">Zip Code</label>
                                                </th>
                                                <td><input type="number" class="form-control  text-dark" name="uZip" id="uZip"
                                                    value="<?php echo e(Auth::user()->uZip); ?>" required>
                                                </td>
                                            </tr>
                                        </div>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

      </div>
      
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
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ad-sel-del_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jelai\mxm_proj\resources\views/admin/ad_details.blade.php ENDPATH**/ ?>