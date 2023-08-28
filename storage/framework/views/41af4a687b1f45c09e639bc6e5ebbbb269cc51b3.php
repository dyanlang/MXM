
<?php $__env->startSection('title', 'MXM | Enjoy Shopping!'); ?>
<?php $__env->startSection('content'); ?>
<?php
use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Message;
use Illuminate\Http\Request;


?>

<div class="container">
<div class="row">
        <div class="col-md-5 p-2"> <p onclick="goBack()" style="cursor: pointer;">
                <i class="fa fa-arrow-left"></i> BACK
        </div>
    </div>

    <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                    <div class="p-1">
                        <div class="col-md-15 col-md-offset-1 text-center">
                            <img src="/users/<?php echo e($seller->uImg); ?>"  class="img logo mb-5 rounded-circle rounded-circles" width="180" > 
                            <h3  style="margin-top: -35px;" class="text-secondary">
                             <i class="fa-solid fa-store"></i> <?php echo e($seller->store_name); ?>  </h3>
 <span>                             <a href="#">    <button class="btn btn-secondary float-right "   data-toggle="modal" data-target="#exampleModal<?php echo e($seller->pID); ?>"  >   <i class="fa-solid fa-comment"></i> MESSAGE </button>  </a>
 </span>
                        </div>
                    </div>
                </div>
            </div>          
 
     <?php 
        $sID = $seller->id;
        $allCount = round(Review::join('prdt_tb', 'prdt_tb.uID', '=', 'reviews.sID')
                    ->where('prdt_tb.uID',   $sID )
                    ->where('rtype', 'x')
                    ->avg('rating' ),0) ;
        $allPro =  Product::where('uID',   $sID)->count('pdNam'); # COUNT THE SELLER'S PRODUCTS


    ?>

    
   
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6> PRODUCTS: </h6>  <span class="text-secondary">  <?php echo e($allPro); ?></span>
                  </li>
                 
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6>    REVIEWS:</h6> 

                                            <h6> 

                    <?php if( $allCount == 5): ?>
                    <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star  text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-warning star-light mr-1 main_star"></i>

                    <?php elseif( $allCount == 4): ?>
                    <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star  text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>

                    <?php elseif( $allCount == 3): ?>
                    <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star  text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>

                    <?php elseif( $allCount == 2): ?>
                    <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>

                    <?php elseif( $allCount == 1): ?>
                    <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>

                    <?php elseif( $allCount == 0): ?>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                    <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>

                    <?php endif; ?>

                    </h6> 
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6>JOIN: </h6> <span class="text-secondary"> <?php echo e($seller->created_at); ?> </span>
                   
                  </li>

                  
                </ul>
              </div>
            </div>
<!--  MODAL -->

    

<div class="cart-modal modal modal-bottom fade" id="exampleModal<?php echo e($seller->pID); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content ">
     <div class="card p-3 bg-white border">
        <div class="  bg-white">
            <div  class="sticky-top " style="border-bottom: solid lightgray 1px">
                <h4  >  <img src="../users/<?php echo e($seller->uImg); ?>" class="rounded-circle" height="30px" width="30px" > <?php echo e($seller->store_name); ?>  </h4>
               
            </div>

            <?php
            $uImg = Auth()->user()->uImg;    
            $sender = Auth()->user()->id;    
            $click = User::where('id', $sID)
              ->get();
                $youSent = User::join('mes_tb', 'mes_tb.uID', '=', 'users_tb.id')
            
                ->where('mes_tb.sID', $sender ) 
                ->where('mes_tb.uID', $sID )
                ->orWhere('mes_tb.sID', $sID )
                ->orderby('mDate', 'DESC')
                ->get();
            ?>

            <div class="position-relative chats ">
                <div class="chat-messages">
                    <div class="load d-flex flex-column-reverse overflow-auto" style="height:417px; "  id="load-mes"> 
                            <?php $__currentLoopData = $youSent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($mes->uID == $seller->id): ?>
                                    <div class="chat-message-left mb-3" >
                                                <div data-toggle="tooltip" title=" sent <?php echo e($mes->mDate); ?>"  >
                                                <img src="../users/<?php echo e($seller->uImg); ?>" class="rounded-circle" height="40px" width="40px" >
                                                    <div class="text-muted small text-nowrap mt-2"> </div>
                                                </div>
                                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                    <div class="font-weight-bold mb-1"  >  <?php echo e($seller->store_name); ?> </div>
                                                    <?php echo e($mes->mCon); ?>

                                                </div>
                                            </div>
                                    <?php else: ?>
                                    <div class="chat-message-right mb-3">
                                        <div data-toggle="tooltip" title=" sent <?php echo e($mes->mDate); ?>">
                                        <img src="../users/<?php echo e($uImg); ?>" class="rounded-circle" height="40px" width="40px" >
                                        
                                        </div>
                                        <div class="flex-shrink-1  rounded py-2 px-3 mr-3" style="background-color: #00FF00">
                                            <div class="font-weight-bold mb-1">You</div>
                                            <?php echo e($mes->mCon); ?>

                                        </div>
                                    </div>
                                    <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> 
                </div>
            </div>
        </div> 
    </div>
            <div class="chat p-3">
                <div class=" mt-1" > 
                    <form id="chat__form">
                        <input type="hidden"name="sID" class="form-control recipient-id" id="recipient-name"  value="<?php echo e($seller->id); ?> " readonly >
                        <input class="form-control  msg-content"type="text" width="120px" placeholder="Type your message here ...">
                
                        <button type="submit" class="btn  btn chatBTN"> <i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i> </button>
                   </form>

                </div>
            </div>
        </div>
    </div>


</div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>ABOUT SHOP</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row m-9 p-3">
                        <p style="white-space: pre-wrap; font-weight: lighter;  color: black"><?php echo e($seller->store_def); ?></p>
                    </div>
                </div>
            </div>

            <?php
                $top = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->where('order_tb.oStat', 'c')
                ->where('prdt_tb.uID', $seller->id)
                ->get();
 

            ?>
                        
            <section>
                <div class="card caar p-3">  <br>  <div class=" cat text-white" > Top selling PRODUCTS   </div>
                        <div class="row">
                        
                            <div class="topic-switcher" data-topic-switcher>
                                    <h1 class="topic-switcher__title"></h2>
                                        <ul class='topics' >
                                        <?php $__currentLoopData = $top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php 
                                                $sold = Order::where('oStat', 'c') // complete
                                        ->where('pID', $pro->pID )
                                        ->sum('oQty');
                                        ?>
                                            <li class="topic-switcher__item">
                                                <a class="topic-cover" href="/onclick/<?php echo e($pro->pID); ?>">
                                                    <div class="topic-cover__content "> <center> <img class=" img-img "  src=" <?php echo e(URL::asset('/products/'.$pro->pdImg )); ?>"   alt="Card image cap" > </center> 
                                                        <h6 style="font-weight: lighter;  color: black" >  <?php echo e($pro->pdNam); ?> </p>
                                                        <h6 style="color: green; margin-top:-7%; "  > ₱ <?php echo e($pro->pdPrc); ?>   
                                                        <h id="view" style="float:right; font-size:10pt;" > Sold:<?php echo e($sold); ?> </h> </h6> 
                                                    </div>
                                                </a>
                                            </li>  

                                           
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        </ul>
                                    </div>
                                </div>  
                     
                            </div>   <br> 
                    </section>
            
        <section>
          
                 <?php
                     $top = Product::orderby('created_at','desc')->take(10)->get();
                ?>
                <section>
             
                <div class="card  p-3">  <br>  <div class=" cat " > new products   </div>
                        <div class="row">
                    
                           
                            <div class="topic-switcher" data-topic-switcher1>
                                    <h1 class="topic-switcher__title"></h2>
                                        <ul class='topics' >
                                        <?php $__currentLoopData = $top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php 
                                                $sold = Order::where('oStat', 'c') // complete
                                        ->where('pID', $pro->pID )
                                        ->sum('oQty');
                                        ?>
                                            <li class="topic-switcher__item">
                                                <a class="topic-cover" href="/onclick/<?php echo e($pro->pID); ?>">
                                                    <div class="topic-cover__content "> <center> <img class=" img-img "  src=" <?php echo e(URL::asset('/products/'.$pro->pdImg )); ?>"   alt="Card image cap" > </center> 
                                                        <h6 style="font-weight: lighter;  color: black" >  <?php echo e($pro->pdNam); ?> </p>
                                                        <h6 style="color: green; margin-top:-7%; "  > ₱ <?php echo e($pro->pdPrc); ?>   
                                                        <h id="view" style="float:right; font-size:10pt;" > Sold:<?php echo e($sold); ?> </h> </h6> 
                                                    </div>
                                                </a>
                                            </li>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        </ul>
                                    </div>
                                     
                                </div>  
                      
                            </div>   <br> 
                    </section>


                  <div class="card">
                    <div class="  bg-white  p-4"  > <br> <div class="cat">  PRODUCT LIST       </div>
                         
                            <div class='row'>
                            <?php $__currentLoopData = $prod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                <div class='product--blue'>
                                    <div class='product_inner'>
                                        <a href="/onclick/<?php echo e($prods->pID); ?> ">
                                            <img src="/products/<?php echo e($prods->pdImg); ?>" alt="Card image cap" width='180'>
                                                <h6 style="font-weight: lighter; color: black" >  <?php echo e($prods->pdNam); ?> </p>
                                                <h6 style="color: green; margin-top:-7%; "  > ₱ <?php echo e($prods->pdPrc); ?>    </H6> 
                                        </a>
                                    </div>
                                </div>
                                <div class='product--blue'>
                                    <div class='product_inner'>
                                        <a href="/onclick/<?php echo e($prods->pID); ?> ">
                                            <img src="/products/<?php echo e($prods->pdImg); ?>" alt="Card image cap" width='180'>
                                                <h6 style="font-weight: lighter; color: black" >  <?php echo e($prods->pdNam); ?> </p>
                                                <h6 style="color: green; margin-top:-7%; "  > ₱ <?php echo e($prods->pdPrc); ?>    </H6> 
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                    </div>
                </div>


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
    $('#carousel').carousel({
        interval: 1000
    })
</script>

<script>
    function goBack() {
    window.history.back();
    }
</script>

<script>
     $(document).ready(function () {
  
  $('#chat__form').on('submit', function (e){
  e.preventDefault();

    var sID = $(this).closest('.chat').find('.recipient-id').val();
    var mCon = $(this).closest('.chat').find('.msg-content').val();
    var date = new Date().toJSON().slice(0,10).replace(/-/g,'/');
    $.ajax({
      type: 'GET',
      url: "<?php echo e(route('message')); ?>",
      data: {
              'sID' : sID, 
              'mCon' : mCon, 
            },
            success: function(){ 
                   $('.load').html('');
                   $('.load').load(' #load-mes');
                   $('.msg-content').val(''); 
                 
                                        
                }
             });
      }); 



  });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jelai\mxm_proj\resources\views/users/view_shop.blade.php ENDPATH**/ ?>