
<?php $__env->startSection('title', 'MXM | Enjoy Shopping!'); ?>
<?php $__env->startSection('content'); ?>

<div class="container" style="margin-top: 5%;">

    <ul class="nav nav-tabs" >
        <li class="nav-item" style="width: 14%">
            <a href="#pending" class="nav-link active" data-toggle="tab" style="font-weight: bold; color: green; text-align: center">
                <?php if($pending > 0): ?>
                    Pending Orders (<?php echo e($pending); ?>)
                <?php else: ?>
                    Pending Orders
                <?php endif; ?>
            </a>
        </li>
        <li class="nav-item" style="width: 14%">
            <a href="#toship" class="nav-link" data-toggle="tab" style="font-weight: bold; color: green; text-align: center">
                <?php if($toship > 0): ?>
                    To Ship (<?php echo e($toship); ?>)
                <?php else: ?>
                    To Ship
                <?php endif; ?>
            </a>
        </li>
        <li class="nav-item" style="width: 14%">
            <a href="#toreceive" class="nav-link" data-toggle="tab" style="font-weight: bold; color: green; text-align: center">
                <?php if($toreceive > 0): ?>
                    To Receive (<?php echo e($toreceive); ?>)
                <?php else: ?>
                    To Receive
                <?php endif; ?>
            </a>
        </li>
        <li class="nav-item" style="width: 14%">
            <a href="#completed" class="nav-link" data-toggle="tab" style="font-weight: bold; color: green; text-align: center">Completed</a>
        </li>
        <li class="nav-item" style="width: 14%">
            <a href="#cancelled" class="nav-link" data-toggle="tab" style="font-weight: bold; color: green; text-align: center">Cancelled</a>
        </li>

        <li class="nav-item" style="width: 14%">
            <a href="#return" class="nav-link" data-toggle="tab" style="font-weight: bold; color: green; text-align: center">
                <?php if($return > 0): ?>
                    Return/Refund (<?php echo e($return); ?>)
                <?php else: ?>
                    Return/Refund
                <?php endif; ?>
            </a>
        </li>
     
        <li class="nav-item" style="width: 14%">
            <a href="#all" class="nav-link" data-toggle="tab" style="font-weight: bold; color: green; text-align: center">All with Insights</a>
        </li>
    </ul>

    
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pending">

            <div class="card-body">
                <div id="overflowTest2">
                    <table class="table table-striped">

                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($order->oStat == 'p'): ?>
                                <tr>
                                    <td>
                                        <a href="/view_order/<?php echo e($order->oID); ?>">
                                            <img src="products/<?php echo e($order->pdImg); ?>" height="30px" width="30px">
                                                &nbsp; &nbsp;
                                            <?php echo e($order->pdNam); ?>

                                        </a>
                                            <input type="hidden" value="<?php echo e($order->oID); ?>">
                                    </td>
                                    <td>
                                        <p style="color: green">Category : <?php echo e($order->pdCat); ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>

                    <?php if($pending < 1): ?>
                        <center>
                            <h5 style="color: green; filter: opacity(45%);"><b>Ooops! No orders yet</b></h5>
                            <br>
                            <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
                        </center>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="tab-pane fade show" id="toship">
            <div class="card-body">
                <div id="overflowTest2">
                    <table class="table table-striped">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($order->oStat == 's' || $order->oStat == 'w'): ?>
                                <tr>
                                    <td>
                                        <a href="/view_order/<?php echo e($order->oID); ?>">
                                            <img src="products/<?php echo e($order->pdImg); ?>" height="30px" width="30px">
                                            &nbsp; &nbsp;
                                            <?php echo e($order->pdNam); ?>

                                        </a>
                                            <input type="hidden" value="<?php echo e($order->oID); ?>">
                                    </td>
                                    <td>
                                        <p style="color: green">Category : <?php echo e($order->pdCat); ?></p>
                                    </td>
                                    <td>
                                        <?php if($order->dAct == '2'): ?>
                                            
                                            <i><p style="color: green; font-weight: bold">Accepted !</p></i>
                                            
                                        <?php endif; ?>

                                        <?php if($order->oStat == 'w' && $order->dAct == '1'): ?>
                                            
                                            <i><p style="color: green; font-weight: bold">Waiting</p></i>
                                        
                                        <?php endif; ?>

                                        <?php if($order->oStat == 's' && $order->dAct == '3'): ?>
                                            
                                            <i><p style="color: red; font-weight: bold">Courier cancelled your request</p></i>
                                            
                                        <?php endif; ?>

                                        <?php if($order->oStat == 's' && $order->sAct == '1'): ?>
                                            
                                            <i><p style="color: red; font-weight: bold">Your request has been cancelled</p></i>
                                            
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </table>

                    <?php if($toship < 1): ?>
                        <center>
                            <h5 style="color: green; filter: opacity(45%);"><b>Ooops! No orders yet</b></h5>
                            <br>
                            <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
                        </center>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="tab-pane fade show" id="toreceive">
            <div class="card-body">
                <div id="overflowTest2">
                    <table class="table table-striped">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($order->oStat == 'r'): ?>
                                <tr>
                                    <td>
                                        <a href="/view_order/<?php echo e($order->oID); ?>">
                                            <img src="products/<?php echo e($order->pdImg); ?>" height="30px" width="30px">
                                            &nbsp; &nbsp;
                                            <?php echo e($order->pdNam); ?>

                                        </a>
                                            <input type="hidden" value="<?php echo e($order->oID); ?>">
                                    </td>
                                    <td>
                                        <p style="color: green">Category : <?php echo e($order->pdCat); ?></p>
                                    </td>
                                    <?php if($order->dAct == 'd'): ?>
                                        <td>
                                            <i><p style="color: green; font-weight: bold">Delivered !</p></i>
                                        </td>
                                    <?php else: ?>
                                        <td></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </table>

                    <?php if($toreceive < 1): ?>
                        <center>
                            <h5 style="color: green; filter: opacity(45%);"><b>Ooops! No orders yet</b></h5>
                            <br>
                            <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
                        </center>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="tab-pane fade show" id="completed">

            <div class="card-body">
                <div id="overflowTest2">
                    <table class="table table-striped">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($order->oStat == 'c'): ?>
                                <tr>
                                    <td>
                                        <a href="/view_order/<?php echo e($order->oID); ?>">
                                            <img src="products/<?php echo e($order->pdImg); ?>" height="30px" width="30px">
                                            &nbsp; &nbsp;
                                            <?php echo e($order->pdNam); ?>

                                        </a>
                                            <input type="hidden" value="<?php echo e($order->oID); ?>">
                                    </td>
                                    <td>
                                        <p style="color: green">Category : <?php echo e($order->pdCat); ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </table>

                    <?php if($completed < 1): ?>
                        <center>
                            <h5 style="color: green; filter: opacity(45%);"><b>Ooops! No orders yet</b></h5>
                            <br>
                            <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
                        </center>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="cancelled">

            <div class="card-body">
                <div id="overflowTest2">
                    <table class="table table-striped">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($order->oStat == '5'): ?>
                                <tr>
                                    <td>
                                        <a href="/view_order/<?php echo e($order->oID); ?>">
                                            <img src="products/<?php echo e($order->pdImg); ?>" height="30px" width="30px">
                                            &nbsp; &nbsp;
                                            <?php echo e($order->pdNam); ?>

                                        </a>
                                            <input type="hidden" value="<?php echo e($order->oID); ?>">
                                    </td>
                                    <td>
                                        <p style="color: green">Category : <?php echo e($order->pdCat); ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </table>

                    <?php if($cancelled < 1): ?>
                        <center>
                            <h5 style="color: green; filter: opacity(45%);"><b>Ooops! No orders yet</b></h5>
                            <br>
                            <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
                        </center>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="tab-pane fade show" id="return">
            <div class="card-body">
                <div id="overflowTest2">
                    <table class="table table-striped">
                        <!-- <thead style="background-color: lightgray">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Product</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead> -->
                        
                        <?php $__currentLoopData = $buyers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buyer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <p style="font-weight: bold; color: green">
                                        <img src="users/<?php echo e($buyer->uImg); ?>" height="30px" width="30px">
                                        &nbsp; &nbsp;
                                        <?php echo e($buyer->lastname); ?>, <?php echo e($buyer->firstname); ?>

                                    </p>
                                </td>
                                
                                <td>
                                    <p style="font-weight: bold; color: green"> 
                                        <img src="products/<?php echo e($buyer->pdImg); ?>" height="30px" width="30px">
                                        &nbsp; 
                                        <?php echo e($buyer->pdNam); ?>

                                    </p>
                                </td>
                                <td>
                                    <p style="font-weight: bold; color: green">
                                        <?php echo e($buyer->RFdat); ?>

                                    </p>
                                </td>
                                <td>
                                    <i><p style="font-weight: bold; color: green">
                                        Returned
                                    </p></i>
                                </td>
                                <td>
                                    <a href="/return/<?php echo e($buyer->oID); ?>">
                                        <i class="fa fa-eye" style="font-size: 16px; color: black" title="View"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php if($return < 1): ?>
                            <div class="container">
                                <center>
                                    <h5 style="color: green; filter: opacity(45%);"><b>No return/refund requests</b></h5>
                                    <br>
                                    <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
                                </center>
                            </div>
                        <?php endif; ?>
                        
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane fade show" id="all">

            <div class="card-body">
                <div id="overflowTest2">
                    <table class="table table-striped">

                    
                        
                    </table>

                    
                        <center>
                            <h5 style="color: green; filter: opacity(45%);"><b>Ooops! No orders yet</b></h5>
                            <br>
                            <img src="/logo/MXM-GreenLogo.png" class="green" style="filter: opacity(60%); height: 120px; width: 140px" alt="filter applied">
                        </center>
                  
                </div>
            </div>
        </div>
    </div>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ad-sel-del_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\breym\mxm_proj\resources\views/seller/seller_history.blade.php ENDPATH**/ ?>