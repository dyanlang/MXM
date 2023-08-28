
<?php $__env->startSection('title', 'MXM | Enjoy Shopping!'); ?>
<?php $__env->startSection('content'); ?>

<?php
use App\Models\Order;
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


<?php if(Session::has('added')): ?>
<script>
    Swal.fire({
  icon: 'success',
  title: 'Added to cart!',
  confirmButtonColor: '#00FF00',
})
   </script>
<?php endif; ?>

<?php if(Session::has('message')): ?>

<script>
      $(document).ready(function(){ $("#success_tic").modal('show'); });
</script>

      <div class="modal fade" id="success_tic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>      
                  <div class="page-body">
                        <div class="head">  
                              <h3 style="margin-top:5px;"> Congratulations! </h3>
                              <h4> You've successfully order the product </h4>
                        </div>

                  <h1 style="text-align:center;"><div class="checkmark-circle">
                        <div class="background"></div>
                              <div class="checkmark draw"></div>
                              </div>
                        </div>
                  </h1>
                  </div>
            </div>
      </div>
<?php endif; ?>



<div class="container bg-white p-3"> <div class="cat">  CATEGORIES   </div>
      <div class="row">
            <section>

      <!-- category -->

<div class="category-item ">
      <div class="category-item-list-wrapper bg-white" style="padding: 1rem;" >  

      <div class="row d-flex align-items-center">
      <div class="col-sm-1 d-flex align-items-center justify-content-center">
         <a role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <div class="carousel-nav-icon">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <path d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/>
               </svg>
            </div>
         </a>
      </div>

      

      <div class="col-10 align-items-center">
         <!--Start carousel-->
         <div  id="carouselExampleIndicators" class="carousel slide"  data-interval="false">

            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="row">


            <ul class="category-item-list">
            <li class="category">
                  <a href="/category/W1" style="color:#000;" role="button">
                  <div id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img"  src=" <?php echo e(URL::asset('/category/w1.jpg')); ?> " alt="Card image cap"  >
                        <div class="caption">  Women's Apparel     </a> </div> 
                  </div>

                  <a href="/category/M2" style="color:#000;" role="button">
                  <div id= "xup" class="thumbnail"> 
                  <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/m1.jpg')); ?> " alt="Card image cap"  >
                        <div class="caption"> Men's Apparel    </a> </div> 
                  </div>
            </li>
            <li class="category">
                  <a href="/category/W2" style="color:#000;" role="button">
                  <div id= "xup" class="thumbnail"> 
                        <img class="card-img-top  thumbnail-img" src=" <?php echo e(URL::asset('/category/w2.jpg')); ?> " alt="Card image cap"  >
                        <div class="caption"> Women's Accesories </a>  </div> 
                  </div>

                  <a href="/category/M4 " style="color:#000;" role="button">
                  <div id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/m3.jpg')); ?> " alt="Card image cap" >
                        <div class="caption"> Men's Bags and Accesories   </a></div> 
                  </div>
            </li>

            <li class="category">
           
                  <a href="/category/B1" style="color:#000;" role="button">
                  <div  id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img"  src=" <?php echo e(URL::asset('/category/b1.jpg')); ?> " alt="Card image cap"  >
                        <div class="caption"> Baby & Kids  </a></div> 
                  </div>

                 <a href="/category/M1" style="color:#000;" role="button">
                 <div id= "xup" class="thumbnail"> 
                       <img class="card-img-top thumbnail-img" src="  <?php echo e(URL::asset('/category/m2.jpg')); ?> " alt="Card image cap" >
                       <div class="caption">   Make up & fragrances    </a> </div> 
                 </div>
           </li>


           <li class="category">
           
                  <a href="/category/W3 " style="color:#000;" role="button">
                  <div id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img"  src="  <?php echo e(URL::asset('/category/w3.jpg')); ?>" alt="Card image cap"  >
                        <div class="caption">  Women's  Bag     </a></div> 
                  </div>

                 <a href="/category/H1 " style="color:#000;" role="button">
                 <div id= "xup" class="thumbnail"> 
                       <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/p2.jpg')); ?> " alt="Card image cap" >
                       <div class="caption">  Health & Personal Care  </a>  </div> 
                 </div>
              
           </li>

           <li class="category">
                  <a href="/category/W4 " style="color:#000;" role="button">
                  <div id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img"  src=" <?php echo e(URL::asset('/category/w4.jpg')); ?> " alt="Card image cap"  >
                        <div class="caption">  Women's  Shoes  </a> </div> 
                  </div>

                  <a href="/category/M3" style="color:#000;" role="button">
                  <div id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/m4.jpg')); ?> " alt="Card image cap" >
                              <div class="caption"> Men's Shoes   </p> </a></div> 
                  </div>
           </li>

           <li class="category">
                  
                  <a href="/category/T1" style="color:#000;" role="button">
                  <div  id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/t1.jpg')); ?>   " alt="Card image cap" >
                        <div class="caption">  Toys, games & collectibles   </p>     </a> </div> 
                  </div>
            
                  <a href="/category/G1 " style="color:#000;" role="button">
                  <div  id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/g2.jpg')); ?>   " alt="Card image cap" >
                        <div class="caption">  Gaming     </a> </div> 
                  </div>
            </li>

          

         
                  <li class="category">
                  
                              <a href="/category/S1" style="color:#000;" role="button">
                              <div  id= "xup" class="thumbnail"> 
                                    <img class="card-img-top thumbnail-img"  src="  <?php echo e(URL::asset('/category/s1.jpg')); ?> " alt="Card image cap"  >
                                    <div class="caption"> Sports & travel      </div> </a>
                              </div>

                        <a href="/category/M7 " style="color:#000;" role="button">
                        <div id= "xup" class="thumbnail"> 
                              <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/m6.jpg')); ?>" alt="Card image cap" >
                              <div class="caption">  Mobile & Gadget     </a> </div> 
                        </div>
                  </li>
                  </div>
                  </div>
         
                  <div class="carousel-item">
                  <div class="row">

           <li class="category">
      
                 <a href="/category/C1" style="color:#000;" role="button">
                 <div  id= "xup" class="thumbnail"> 
                       <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/c1.jpg')); ?>   " alt="Card image cap" >
                       <div class="caption"> Cameras  </p>     </a> </div> 
                 </div>
            
                  <a href="/category/H2" style="color:#000;" role="button">
                  <div  id= "xup" class="thumbnail"> 
                       <img class="card-img-top thumbnail-img" src="<?php echo e(URL::asset('/category/h3.jpg')); ?>   " alt="Card image cap" >
                       <div class="caption"> Hobbies & stationaries  </p>     </a> </div> 
                 </div>
           </li>



         
           <li class="category">
      
                  <a href="/category/P1" style="color:#000;" role="button">
                  <div  id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/p1.jpg')); ?>  " alt="Card image cap" >
                        <div class="caption"> Pet Care     </a> </div> 
                  </div>

                  <a href="/category/G2 " style="color:#000;" role="button">
                  <div  id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img" src="<?php echo e(URL::asset('/category/g1.jpg')); ?>   " alt="Card image cap" >
                        <div class="caption"> Groceries     </a> </div> 
                  </div>
                  </li>

                  <li class="category">
                  
                  <a href="/category/M5 " style="color:#000;" role="button">
                  <div  id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/m5.png')); ?>  " alt="Card image cap" >
                        <div class="caption">  Mobile Accesories </p>     </a> </div> 
                  </div>
            

                  <a href="/category/M6 " style="color:#000;" role="button">
                  <div id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/m7.jpeg')); ?>    " alt="Card image cap" >
                        <div class="caption">  Motors  </p>     </a> </div> 
                  </div>
            </li>

          
            <li class="category">

            <a href="/category/H3" style="color:#000;" role="button">
                  <div  id= "xup" class="thumbnail"> 
                        <img class="card-img-top thumbnail-img"  src=" <?php echo e(URL::asset('/category/h1.jpg')); ?> " alt="Card image cap"  >
                        <div class="caption"> Home Entertainment </a> </div> 
                  </div>

            <a href="/category/H4 " style="color:#000;" role="button">
            <div  id= "xup" class="thumbnail"> 
                  <img class="card-img-top thumbnail-img"  src="<?php echo e(URL::asset('/category/h2.jpg')); ?> " alt="Card image cap"  >
                  <div class="caption"> Home Living   </a> </div> 
                  </div>

            </li>
            </div>
               </div>
            </div>
         </div>
         </div>
      
         <div class="col-1 d-flex align-items-center justify-content-center"><a role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
         <div class="carousel-nav-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
               <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/>
            </svg>
         </div>
         </a>
      </div>

    
      
      </div>      
</div>
</section>

</div></div>
</div>

<section>
<div class="container  bg-white p-3">  <br>  <div class="cat">  TOP PRODUCTS   </div>
            <div class="row">
            <?php $__currentLoopData = $top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php
            $sold = Order::where('oStat', 'c') // complete
            ->where('pID', $pro->pID )
            ->sum('oQty'); 

            $sold = Order::where('oStat', 'c') // complete
            ->where('pID', $pro->pID )
            ->sum('oQty'); 

            ?>
            
                  <div  id= "xup" class="box">
                        <div class="box-img">
                              <a href="/onclick/<?php echo e($pro->pID); ?> ">

                              <img  src=" <?php echo e(URL::asset('/products/'.$pro->pdImg )); ?> " alt="Card image cap" width="200px" height="220px">
                        <div class="">
                              <h6 style="font-weight: lighter; color: black" >  <?php echo e($pro->pdNam); ?> </p>
                              <h6 style="color: green; margin-top:-7%; "  > ₱ <?php echo e($pro->pdPrc); ?>   
                              <h id="view" style="float:right; font-size:10pt;" > Sold:<?php echo e($sold); ?> </h> </h6>    </a>
                        </div>
                        </div>
                  </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>  </div>   <br> 

            </section>
            
            <section>
      <div class="container  bg-white  p-3"  > <br> <div class="cat">  DAILY DISCOVERY
      <div class="container bg-white " style="padding: 2rem;" >     </div></div>  
            <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $sold = Order::where('oStat', 'c')
                  ->where('pID', $products->pID )
                  ->sum('oQty'); 
            ?>

                  <div id="xup" class="box" >
                        <div class="box-img">
                              <a href="/onclick/<?php echo e($products->pID); ?> ">

                              <img  src=" <?php echo e(URL::asset('/products/'.$products->pdImg )); ?> " alt="Card image cap" width="195px" height="210px">
                        <div class="">
                              <h6 style="font-weight: lighter; color: black" >  <?php echo e($products->pdNam); ?> </p>
                              <h6 style="color: green; margin-top:-7%; "  > ₱ <?php echo e($products->pdPrc); ?>    
                              <h id="view" style="float:right; font-size:10pt;" > Sold: <?php echo e($sold); ?> </h> </h6>    </a>
                        </div>
                        </div>
                      </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>  </div></section>
<br><br>
            <div class="footer">


            </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\breym\mxm_proj\resources\views/users/Home.blade.php ENDPATH**/ ?>