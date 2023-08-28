
<?php $__env->startSection('title', 'MXM | Enjoy Shopping!'); ?>
<?php $__env->startSection('content'); ?>

  
<div class="container bg-white shadow p-5" >
    <div class="row">
        <h5 id="view"> Delivery Address </h5>

        <div class="col">
            <h5> <?php echo e(Auth::user()->uMob); ?> </h5>
                <h5> <?php echo e(Auth::user()->uBrgy); ?> <?php echo e(Auth::user()->uProv); ?> <?php echo e(Auth::user()->uCity); ?>  <a href="/settings/<?php echo e(Auth::user()->id); ?>"><button style="FLOAT: right;" class="btn btn-primary"> EDIT </button> </a> </h4> 
            
            </div>
       
            </div> </div>
            <div class="container bg-white shadow p-5"  style="margin-top: 6px">

<div class="row">

    <h5 id="view">  PRODUCTS ORDERED    
            <h id="view" style="float:right;"> 
                    <?php
                            $COD = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 12);
                            echo   "ORDER CODE: " , $COD;
                    ?>
                </h>
        </h5>
</div>

    <div class="row">   

      <?php $__currentLoopData = $checkout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <input type="hidden" value="    <?php echo e($check= $check->username); ?> " >
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    
      <div class="row ">
                  
                  <div class="col-5" > </div>
                  <div class="col" style="font-weight: bold; text-transform: uppercase ">Unit Price </div>
                  <div class="col"  style="font-weight: bold; text-transform: uppercase "> Amount</div>
                  <div class="col " style="font-weight: bold; text-transform: uppercase; ">Item Sub Total </div>
                  <div class="col" > </div>
             </div>
           
       
        </div>
    
        <div class="row">
    <?php $total = 0 ?>
    <?php $__currentLoopData = $checkout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $total += $check->pdPrc * 1 ?> 
    <div class="col-5" style="font-weight: lighter; ">  <img src= "<?php echo e(URL::asset('/products/'.$check->pdImg  )); ?>"   style="max-width:50px;">  <?php echo e($check->pdNam); ?> </div>
                        <div class="col" style="font-weight: lighter; ">VARIATION: </div>
                        <div class="col" style="font-weight: lighter; ">  ₱ <?php echo e($check->pdPrc); ?> </div>
                        <div class="col text-center "style="font-weight: lighter; "><?php echo e($check->oQty); ?>  </div>
                        <div class="col"style="font-weight: lighter; "> ₱  <?php echo e($total); ?></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </div>
        <br><br>       <br><br>
        <div class="row">
    
    <?php $total = 0 ?>
    <?php $__currentLoopData = $checkout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $total += $check->pdPrc * 1 ?> 


            <h5 id="view">   SHIPPING  </h5>
            <hr>

            <h5>From:  <?php echo e(Auth::user()->uBrgy); ?> <?php echo e(Auth::user()->uProv); ?> <?php echo e(Auth::user()->uCity); ?>  to  <?php echo e($check->uBrgy); ?> <?php echo e($check->uProv); ?>  <?php echo e($check->uCity); ?> </h5>
            <?php 
            $ship =  $check->pdWeight * $check->pdHeight * $check->pdLength / 3500;
            ?>
            <?php if(  $ship < 0.5): ?>
              <input type="hidden" value="<?php echo e($fee = '50'); ?>">

            <?php elseif( $ship >1): ?>
          
             <input type="hidden" value="   <?php echo e($fee = '75'); ?>">
            <?php else: ?>
            <input type="hidden" value="    <?php echo e($fee = '105'); ?>">

           
            <?php endif; ?>
            <h5 style="text-align: right;"> ₱ <?php echo e($fee); ?></h5>

        </div>
        <br><br>

        <div class="row">
        <h5 id="view" style="text-align: right;">  ORDER TOTAL(  
            <?php if( $check->oQty  > 1 ): ?>  
               <?php echo e($check->oQty); ?> Items
            <?php else: ?>
               <?php echo e($check->oQty); ?>  Item
            <?php endif; ?>
            
            )   :   ₱ <?php echo e($total); ?>  </h5>
        <h5 id="view" style="text-align: right;"> TOTAL :   ₱<?php echo e($fee +     $total); ?>  </h5>
          <br>
          <hr>
        </div>
        <br>  
          <form method="POST"  action="<?php echo e(route('placeorder', $check->pID)); ?>" >
        <h5 id="view"> MESSAGE :  </h5>
        <textarea name="oMes"  cols="50" rows="20"></textarea>
          <br>
          <hr>
       

        <br>  
        <div class="row">
        <h5 id="view" style="text-align: right;"> MECHANDISE SUBTOTAL :  ₱ <?php echo e($total); ?>   </h5>
        <h5 id="view" style="text-align: right;"> SHIPPING SUBTOTAL : ₱  <?php echo e($fee); ?> </h5>
        <h5 id="view" style="text-align: right;"> TOTAL  PAYMENT: ₱  ₱<?php echo e($fee +     $total); ?>   </h5>
        <br>
        <br> <br>
        </div>
        <button style="FLOAT: right;" type="submit" class="btn btn-primary">  PLACE ORDER  </button>
        <a href="/home"> <button style="FLOAT: right;" type="button" class="btn btn-secondary">CANCEL</button></a>

        </div>

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>    
                <input type="hidden" name="sID" value= " <?php echo e($check->id); ?> "> <!--- Seller ID  -->
                <input type="hidden" name="pID" value= " <?php echo e($check->pID); ?> "> <!--- Seller ID  -->
                    <input type="hidden" name="COD" value= " <?php echo e($COD); ?> "> <!--- Order code  -->
                    <input type="hidden" name="stat" value= "1"> <!--- / status [pending order to seller] -->
                    <input type="hidden" name="mode" value= "1">  <!--- mode of payment [1] =  COD -->
              
                
                <br><br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </form>
  
  

</div>

</div>

<?php $__env->stopSection(); ?>


<input type="hidden" name="oID" value= " <?php echo e($check->oID); ?> "> <!--- Seller ID  -->
                <input type="hidden" name="sID" value= " <?php echo e($check->id); ?> "> <!--- Seller ID  -->
                <input type="hidden" name="pID" value= " <?php echo e($check->pID); ?> "> <!--- Seller ID  -->
                <input type="hidden" name="oQty" value= " <?php echo e($check->oQty); ?> "> <!--- Seller ID  -->
                   
                <input type="hidden" name="COD" value= " <?php echo e($COD); ?> "> <!--- Order code  -->
                    <input type="hidden" name="stat" value= "p"> <!--- / status [pending order to seller] -->
                    <input type="hidden" name="mode" value= "1">  <!--- mode of payment [1] =  COD -->
                    <input type="hidden" name="cout" value= "0">  <!--- mode of payment [1] =  COD -->
             
<?php echo $__env->make('layouts.checkout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jelai\mxm_proj\resources\views//users/checkout.blade.php ENDPATH**/ ?>