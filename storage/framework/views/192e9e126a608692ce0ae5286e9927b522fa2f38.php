
<?php $__env->startSection('title', 'MXM | Enjoy Shopping!'); ?>
<?php $__env->startSection('content'); ?>

<?php $date = date(" F"); 
$time = date("d-M-Y");
?> 
<div class="container">
    <div class="row">

<div class="white-bg container-fluid">
    <section id="minimal-statistics">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
                <h4 class="text-uppercase text-end">Month of <?php echo e($date); ?> </h4>
                <h6 class="text-uppercase text-end">Today's Report   <?php echo e($time); ?></h6>
                <p></p>
            </div>
        </div>
    
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger"><?php echo e($prodNo); ?></h3>
                                    <span> Products </span>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-box-open font-large-2 float-right"></i>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger"><?php echo e($orderNo); ?></h3>
                                    <span>Pending Orders </span>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-spinner text-warning font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="warning"> <?php echo e($pickNo); ?> </h3>
                                    <span> To Pick Up </span>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-truck text-danger font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success"><?php echo e($shipNo); ?></h3>
                                    <span> To Ship </span>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-shipping-fast text-success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success"><?php echo e($recNo); ?></h3>
                                    <span> To Receive </span>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-shipping-fast text-success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="primary"><?php echo e($success); ?> </h3>
                                    <span> Successfully delivered </span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-check text-primary font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                <h3 class="danger"><?php echo e($canDelivery); ?></h3>
                                <span> Cancelled Delivery </span>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-window-close text-danger font-large-2 float-right"></i>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                <h3 class="danger"><?php echo e($cancelReq); ?></h3>
                                <span> Seller Cancelled Request </span>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-window-close text-danger font-large-2 float-right"></i>
                                    
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="<?php echo e(url('/history')); ?>">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                    <h3 class="danger"><?php echo e($return_request); ?></h3>
                                    <span> Return Request </span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-window-close text-danger font-large-2 float-right"></i>
                                        
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            
        </div>
    
    </section>
             
    <section id="stats-subtitle">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
                <hr><br>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body cleartfix">
                            <div class="media align-items-stretch">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 mr-2"></i>
                                </div>
                                <div class="media-body" style="margin-left: 3%">
                                    <h4>Total Products Available</h4>
                                    <span> </span>
                                </div>
                                <div class="align-self-center">
                                    <h1><?php echo e($prodNo); ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body cleartfix">
                            <div class="media align-items-stretch">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 mr-2"></i>
                                </div>
                                <div class="media-body" style="margin-left: 3%">
                                    <h4>Total Products Sold Out</h4>
                                    <span>Monthly blog posts</span>
                                </div>
                                <div class="align-self-center">
                                    <h1><?php echo e($sold); ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body cleartfix">
                            <div class="media align-items-stretch">
                                <div class="align-self-center">
                                    <i class="icon-speech warning font-large-2 mr-2"></i>
                                </div>
                                <div class="media-body" style="margin-left: 3%">
                                    <h5> Total Products Review </h4>
                                    <span>Month of</span>
                                </div>
                                <div class="align-self-center"> 
                                    <h1>84,695</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ad-sel-del_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\breym\mxm_proj\resources\views/seller/sel_home.blade.php ENDPATH**/ ?>