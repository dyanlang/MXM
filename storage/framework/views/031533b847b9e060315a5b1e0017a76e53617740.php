
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

<!-- START 1 -->
<div class="container-fluid">
      <div class="row" style="overflow-x:hidden;">
            <div class="col-sm-8"> 
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>

                        </ol>
                        <div class="carousel-inner">
                              <div class="carousel-item active">
                              <img class="img-img" src="<?php echo e(URL::asset('../slides/SALE1.gif')); ?> ">
                              </div>
                              <div class="carousel-item">
                              <img class="img-img" src="<?php echo e(URL::asset('../slides/SALE3.png')); ?>">
                              </div>
                              <div class="carousel-item">
                              <img class="img-img" src="<?php echo e(URL::asset('../slides/SALE2.gif')); ?>">
                              </div>
                              <div class="carousel-item">
                              <img class="img-img" src="<?php echo e(URL::asset('../slides/SALE4.gif')); ?>">
                              </div>
                              <div class="carousel-item">
                              <img class="img-img" src="<?php echo e(URL::asset('../slides/SALE5.gif')); ?>">
                              </div>
                              <div class="carousel-item"> 
                              <img class="img-img" src="<?php echo e(URL::asset('../slides/SALE6.gif')); ?>">
                              </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                        </a>
                  </div>
            </div>

 
            <div class="col-sm-4">
                  <div id="carouselExampleIndicatorx" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicatorx" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicatorx" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicatorx" data-slide-to="2"></li>
                              <li data-target="#carouselExampleIndicatorx" data-slide-to="3"></li>
                        
                        </ol>
                        <div class="carousel-inner">
                              <div class="carousel-item active">
                              <img class="img-img" src="<?php echo e(URL::asset('../slides/a.png')); ?> ">
                              </div>
                              <div class="carousel-item">
                              <img class="img-img" src="<?php echo e(URL::asset('../slides/b.png')); ?>">
                              </div>
                              <div class="carousel-item">
                              <img class="img-img" src="<?php echo e(URL::asset('../slides/3.png')); ?>">
                              </div>
                              <div class="carousel-item">
                              <img class="img-img" src="<?php echo e(URL::asset('../slides/4.png')); ?>">
                              </div>
                        
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicatorx" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicatorx" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                        </a>
                  </div>

            <div id="carouselExampleIndicatorz" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicatorz" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicatorz" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicatorz" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicatorz" data-slide-to="3"></li>

                  </ol>
                  <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="img-img" src="<?php echo e(URL::asset('../slides/5.png')); ?> ">
                        </div>
                        <div class="carousel-item">
                        <img class="img-img" src="<?php echo e(URL::asset('../slides/6.png')); ?>">
                        </div>
                        <div class="carousel-item">
                        <img class="img-img" src="<?php echo e(URL::asset('../slides/7.png')); ?>">
                        </div>
                        <div class="carousel-item">
                        <img class="img-img" src="<?php echo e(URL::asset('../slides/8.png')); ?>">
                        </div>
                  
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicatorz" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicatorz" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                  </a>
            </div>

      </div>
</div>


</div>


<!-- END 1 -->
<br>

<!-- START 2 -->
<br>

<section >  
      <div class="container  bg-white p-3"> <br>  <div class="cat">  CATEGORIES   </div>

      <div class="topic-switcher" data-topic-switcher1>
            <h1 class="topic-switcher__title"></h2>
                  <ul class='topics' >
                        <li class="switcher__item">
                              <a href="/category/W1" style="color:#000;" role="button">
                                    <div id= "xup" class="thumbnail"> 
                                          <img class="card-img-top thumbnail-img  img-responsive"  src=" <?php echo e(URL::asset('/category/w1.jpg')); ?> " alt="Card image cap"  >
                                          <div class="caption">  Women's Apparel     </a> </div> 
                                    </div>

                              <a href="/category/M2" style="color:#000;" role="button">
                                    <div id= "xup" class="thumbnail"> 
                                                <img class="card-img-top thumbnail-img  img-responsive" src=" <?php echo e(URL::asset('/category/m1.jpg')); ?> " alt="Card image cap"  >
                                          <div class="caption"> Men's Apparel    </a> </div> 
                                    </div>
                        </li>
                        <li class="switcher__item">
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
                        <li class="switcher__item">
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
                        <li class="switcher__item">                                                    
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
                        <li class="switcher__item">

                        <a href="/category/W4 " style="color:#000;" role="button">
                                    <div id= "xup" class="thumbnail"> 
                                          <img class="card-img-top thumbnail-img"  src="  <?php echo e(URL::asset('/category/w4.jpg')); ?>" alt="Card image cap"  >
                                          <div class="caption">  Women's  Shoes     </a></div> 
                                    </div>

                        
                              <a href="/category/M3" style="color:#000;" role="button">
                                    <div id= "xup" class="thumbnail"> 
                                          <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/m4.jpg')); ?> " alt="Card image cap" >
                                                <div class="caption"> Men's Shoes  </a></div> 
                                    </div>
                        </li>
                        <li class="switcher__item">    
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
                        <li class="switcher__item">
                                                          
                              <a href="/category/P1" style="color:#000;" role="button">
                                    <div  id= "xup" class="thumbnail"> 
                                          <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/p1.jpg')); ?>  " alt="Card image cap" >
                                          <div class="caption"> Pet Care   </a>   </div> 
                                    </div>
                              
                              <a href="/category/G2 " style="color:#000;" role="button">
                                    <div  id= "xup" class="thumbnail"> 
                                          <img class="card-img-top thumbnail-img" src="<?php echo e(URL::asset('/category/g1.jpg')); ?>   " alt="Card image cap" >
                                          <div class="caption"> Groceries     </a> </div> 
                                    </div>
                                                          
                        </li>

                        <li class="switcher__item">
                              <a href="/category/S1" style="color:#000;" role="button">
                                    <div  id= "xup" class="thumbnail"> 
                                          <img class="card-img-top thumbnail-img"  src="  <?php echo e(URL::asset('/category/s1.jpg')); ?> " alt="Card image cap"  >
                                          <div class="caption"> Sports & travel </a>     </div> 
                                    </div>

                              <a href="/category/M7 " style="color:#000;" role="button">
                                    <div id= "xup" class="thumbnail"> 
                                          <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/m6.jpg')); ?>" alt="Card image cap" >
                                          <div class="caption">  Mobile & Gadget     </a> </div> 
                                    </div>
                        </li>

                        <li class="switcher__item">
                                    <a href="/category/C1" style="color:#000;" role="button">
                                    <div  id= "xup" class="thumbnail"> 
                                          <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/c1.jpg')); ?>   " alt="Card image cap" >
                                          <div class="caption"> Cameras  </a> </div> 
                                    </div>
                                    
                                          <a href="/category/H2" style="color:#000;" role="button">
                                          <div  id= "xup" class="thumbnail"> 
                                          <img class="card-img-top thumbnail-img" src="<?php echo e(URL::asset('/category/h3.jpg')); ?>   " alt="Card image cap" >
                                          <div class="caption"> Hobbies & stationaries     </a> </div> 
                                    </div>
                              </li>
                              <li class="switcher__item">
                                    
                                    <a href="/category/P1" style="color:#000;" role="button">
                                          <div  id= "xup" class="thumbnail"> 
                                                <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/p1.jpg')); ?>  " alt="Card image cap" >
                                                <div class="caption"> Pet Care   </a>   </div> 
                                          </div>
                                    
                                    <a href="/category/G2 " style="color:#000;" role="button">
                                          <div  id= "xup" class="thumbnail"> 
                                                <img class="card-img-top thumbnail-img" src="<?php echo e(URL::asset('/category/g1.jpg')); ?>   " alt="Card image cap" >
                                                <div class="caption"> Groceries     </a> </div> 
                                          </div>
                              </li>
                              <li class="switcher__item">
                                    
                                    <a href="/category/M5 " style="color:#000;" role="button">
                                          <div  id= "xup" class="thumbnail"> 
                                                <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/m5.png')); ?>  " alt="Card image cap" >
                                                <div class="caption">  Mobile Accesories      </a> </div> 
                                          </div>     
                                                            

                                    
                                    <a href="/category/M6 " style="color:#000;" role="button">
                                          <div id= "xup" class="thumbnail"> 
                                                <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/m7.jpeg')); ?>    " alt="Card image cap" >
                                                <div class="caption">  Motors     </a> </div> 
                                          </div>
                                    
                              </li>
                              <li class="switcher__item">
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
                        
                       
    
                  </ul>
      </div>
</div>

</section>

<br>

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

      <div class="topic-switcher" data-topic-switcher>
            <h1 class="topic-switcher__title"></h2>
                  <ul class='topics' >
                        <li class="topic-switcher__item">
                              <a class="topic-cover" href="/onclick/<?php echo e($pro->pID); ?>">
                                    <div class="topic-cover__content "> <center> <img class=" img-img "  src=" <?php echo e(URL::asset('/products/'.$pro->pdImg )); ?>"   alt="Card image cap" > </center> 
                                          <h6 style="font-weight: lighter;  color: black" >  <?php echo e($pro->pdNam); ?> </p>
                                          <h6 style="color: green; margin-top:-7%; "  > ₱ <?php echo e($pro->pdPrc); ?>   
                                          <h id="view" style="float:right; font-size:10pt;" > Sold:<?php echo e($sold); ?> </h> </h6> 
                                         
                                    
                                    </div>
                               </a>
                        </li>
                        <li class="topic-switcher__item">
                              <a class="topic-cover" href="#">
                              <div class="topic-cover__content"><span class="topic__title">Reportagen</span>
                              
                              </div>
                              </a>
                        </li>

                        <li class="topic-switcher__item">
                              <a class="topic-cover" href="#">
                              <div class="topic-cover__content"><span class="topic__title">Reportagen</span>
                            
                              </div>
                              </a>
                        </li>

                        <li class="topic-switcher__item">
                              <a class="topic-cover" href="#">
                              <div class="topic-cover__content"><span class="topic__title">Reportagen</span>
                             
                              </div>
                              </a>
                        </li>

    
                        <li class="topic-switcher__item">
                      
                              <div class="break">
                              <a href="/category/P1" style="color:#000;" role="button">
                                    <div  id= "xup" class="thumbnail"> 
                                          <img class="card-img-top thumbnail-img" src=" <?php echo e(URL::asset('/category/p1.jpg')); ?>  " alt="Card image cap" >
                                          <div class="caption"> Pet Care   </a>   </div> 
                                    </div>
                              </div>

                              <div class="break">
                              <a href="/category/G2 " style="color:#000;" role="button">
                                    <div  id= "xup" class="thumbnail"> 
                                          <img class="card-img-top thumbnail-img" src="<?php echo e(URL::asset('/category/g1.jpg')); ?>   " alt="Card image cap" >
                                          <div class="caption"> Groceries     </a> </div> 
                                    </div>
                              </div>
                        </li>
                       
    
  </ul>
</div>
                  
                  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>  
      </div>   <br> 



            </section>
   

            <section>
      <div class=" container  bg-white  p-3"  > <br> <div class="cat">  DAILY DISCOVERY       </div>
            <div class='row'>

                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                              $sold = Order::where('oStat', 'c')
                                    ->where('pID', $products->pID )
                                    ->sum('oQty'); 
                              ?>
                  <div class='product--blue'>
                  <div class='product_inner'>
                  
                  <a href="/onclick/<?php echo e($products->pID); ?> ">
                        <img src=" <?php echo e(URL::asset('/products/'.$products->pdImg )); ?> " alt="Card image cap" width='300'>
                        <h6 style="font-weight: lighter; color: black" >  <?php echo e($products->pdNam); ?> </p>
                              <h6 style="color: green; margin-top:-7%; "  > ₱ <?php echo e($products->pdPrc); ?>    
                              <h id="view" style="float:right; font-size:10pt;" > Sold: <?php echo e($sold); ?> </h> </h6>    </a>

                  
                  </div>
                  
                  </div>

                  <div class='product--blue'>
                  <div class='product_inner'>
                  
                  <a href="/onclick/<?php echo e($products->pID); ?> ">
                        <img src=" <?php echo e(URL::asset('/products/'.$products->pdImg )); ?> " alt="Card image cap" width='300'>
                        <h6 style="font-weight: lighter; color: black" >  <?php echo e($products->pdNam); ?> </p>
                              <h6 style="color: green; margin-top:-7%; "  > ₱ <?php echo e($products->pdPrc); ?>    
                              <h id="view" style="float:right; font-size:10pt;" > Sold: <?php echo e($sold); ?> </h> </h6>    </a>

                  
                  </div>
                  
                  </div>

                  <div class='product--blue'>
                  <div class='product_inner'>
                  
                  <a href="/onclick/<?php echo e($products->pID); ?> ">
                        <img src=" <?php echo e(URL::asset('/products/'.$products->pdImg )); ?> " alt="Card image cap" width='300'>
                        <h6 style="font-weight: lighter; color: black" >  <?php echo e($products->pdNam); ?> </p>
                              <h6 style="color: green; margin-top:-7%; "  > ₱ <?php echo e($products->pdPrc); ?>    
                              <h id="view" style="float:right; font-size:10pt;" > Sold: <?php echo e($sold); ?> </h> </h6>    </a>

                  
                  </div>
                  
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  

                  </div>
            </div>


</section>
<br><br>
            <div class="footer">


            </div>
            <link href="https://www.jqueryscript.net/css/jquerysctipttop.css?v4" rel="stylesheet" type="text/css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
 $(function(){
    $('.topic-switcher').slick({
      slidesToShow: 8,
      slidesToScroll: 8,
      autoplay: true,
      autoplaySpeed: 2000,
      infinite: true,
    });
});
  </script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/flickity/1.1.2/flickity.pkgd.min.js"></script>
<script>
 var flky = new Flickity( '[data-topic-switcher] ul', {
  // options, defaults listed

  accessibility: true,
  // enable keyboard navigation, pressing left & right keys

  autoPlay: false,
  // advances to the next cell
  // if true, default is 3 seconds
  // or set time between advances in milliseconds
  // i.e. `autoPlay: 1000` will advance every 1 second

  cellAlign: 'center',
  // alignment of cells, 'center', 'left', or 'right'
  // or a decimal 0-1, 0 is beginning (left) of container, 1 is end (right)

  cellSelector: '.topic-switcher__item',
  // specify selector for cell elements

  contain: false,
  // will contain cells to container
  // so no excess scroll at beginning or end
  // has no effect if wrapAround is enabled

  draggable: true,
  // enables dragging & flickin
  freeScroll: false,
  // enables content to be freely scrolled and flicked
  // without aligning cells

  friction: 0.2,
  // smaller number = easier to flick farther

  initialIndex: 0,
  // zero-based index of the initial selected cell

  lazyLoad: false,
  // enable lazy-loading images
  // set img data-flickity-lazyload="src.jpg"
  // set to number to load images adjacent cells

  percentPosition: true,
  // sets positioning in percent values, rather than pixels
  // Enable if items have percent widths
  // Disable if items have pixel widths, like images

  prevNextButtons: true,
  // creates and enables buttons to click to previous & next cells

  pageDots: false,
  // create and enable page dots

  resize: true,
  // listens to window resize events to adjust size & positions

  rightToLeft: false,
  // enables right-to-left layout

  setGallerySize: true,
  // sets the height of gallery
  // disable if gallery already has height set with CSS

  watchCSS: false,
  // watches the content of :after of the element
  // activates if #element:after { content: 'flickity' }
  // IE8 and Android 2.3 do not support watching :after
  // set watch: 'fallbackOn' to enable for these browsers

  wrapAround: true
  // at end of cells, wraps-around to first for infinite scrolling

});
</script>

<script>
 var flky = new Flickity( '[data-topic-switcher1] ul', {
  // options, defaults listed

  accessibility: true,
  // enable keyboard navigation, pressing left & right keys

  autoPlay: false,
  // advances to the next cell
  // if true, default is 3 seconds
  // or set time between advances in milliseconds
  // i.e. `autoPlay: 1000` will advance every 1 second

  cellAlign: 'center',
  // alignment of cells, 'center', 'left', or 'right'
  // or a decimal 0-1, 0 is beginning (left) of container, 1 is end (right)

  cellSelector: '.switcher__item',
  // specify selector for cell elements

  contain: false,
  // will contain cells to container
  // so no excess scroll at beginning or end
  // has no effect if wrapAround is enabled

  draggable: true,
  // enables dragging & flickin
  freeScroll: false,
  // enables content to be freely scrolled and flicked
  // without aligning cells

  friction: 0.2,
  // smaller number = easier to flick farther

  initialIndex: 0,
  // zero-based index of the initial selected cell

  lazyLoad: false,
  // enable lazy-loading images
  // set img data-flickity-lazyload="src.jpg"
  // set to number to load images adjacent cells

  percentPosition: true,
  // sets positioning in percent values, rather than pixels
  // Enable if items have percent widths
  // Disable if items have pixel widths, like images

  prevNextButtons: true,
  // creates and enables buttons to click to previous & next cells

  pageDots: false,
  // create and enable page dots

  resize: true,
  // listens to window resize events to adjust size & positions

  rightToLeft: false,
  // enables right-to-left layout

  setGallerySize: true,
  // sets the height of gallery
  // disable if gallery already has height set with CSS

  watchCSS: false,
  // watches the content of :after of the element
  // activates if #element:after { content: 'flickity' }
  // IE8 and Android 2.3 do not support watching :after
  // set watch: 'fallbackOn' to enable for these browsers

  wrapAround: true
  // at end of cells, wraps-around to first for infinite scrolling

});
</script>

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jelai\____Projects______\mxm_proj\resources\views/users/Home.blade.php ENDPATH**/ ?>