
<?php $__env->startSection('title', 'MXM | Enjoy Shopping!'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2 py-3">
        <h5><a href="/home" class="text-dark">Home</a> › 
            <a href="/home" class="text-dark">Be with MXM</a> › Seller's Registration</h5>
        </div>
    </div>
</div>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header"><?php echo e(__('Register')); ?></div> -->

                <div class="card-body">
                    <form method="POST" action="#">
                        <?php echo csrf_field(); ?>

                        

                        <div class="row mb-3">
                            <label for="uVal_Id_1" class="col-md-4 col-form-label text-md-right">Valid ID (Front)</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="uVal_Id_1">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="uVal_Id_2" class="col-md-4 col-form-label text-md-right">Valid ID (Back)</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="uVal_Id_2">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="u2x2_Id" class="col-md-4 col-form-label text-md-right">2x2 Picture (with white background)</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="u2x2_Id">
                            </div>
                        </div>

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Submit')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jelai\mxm_proj\resources\views/auth/seller_register.blade.php ENDPATH**/ ?>