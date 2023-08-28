
<?php $__env->startSection('title', 'MXM | Enjoy Shopping!'); ?>
<?php $__env->startSection('content'); ?>
<!--- PANSAMANTAGAL -->
<?php
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
?>
<?php
        $x = "x";  // ADD TO CART STATUS //
        $u = "u";
        $uID = Auth()->user()->id;
        $timestamp = Carbon::now()->timezone('Asia/Manila');
    
    $carts = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
        ->leftjoin('users_tb', 'users_tb.id', '=', 'order_tb.sID')
        ->where('order_tb.oStat', $x)
        ->where('order_tb.uID', $uID) 
        ->get();
        

    ?>

<?php if(Session::has('message')): ?>
<script>
    Swal.fire({
  icon: 'success',
  title: 'Deleted!',
  text: 'Product successfully deleted!',
  confirmButtonColor: '#00FF00',
})
   </script>
<?php endif; ?>

<div class="container col-lg-11 " style="margin-top: -3%;" id="all">
    <div class="row" >

        <div class="  col-12  col-md-8 bg-white border shadow p-7 mb-5 bg-white rounded"  >
          
            <section class="bg-white" style="overflow-y:auto; height: 569px" > 
            <table id="my-cart" class="table  table-condensed">
    <?php if($carts == null): ?>
                    <thead>
                        <tr>
                        <th class="text-left"> &nbsp  <input type="checkbox" id="boss" style="margin-top:20px; color: lightgray;" data-toggle="tooltip" title="Select all"> All </th> 
                        <th>Product</th>
                        <th></th>
                        <th>Variation</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>  </th>
                        <th>  </th>
                        <th>  </th>
                        </tr>
                    </thead>
            <tbody>

  <!--- ELSE  --> 
  
    <?php else: ?>

        <thead class="sticky-top bg-white shadow p-4 mb-5">
            <tr> 
            <th class="text-left"> &nbsp  <input type="checkbox" id="boss" style="margin-top:20px; color: lightgray;" data-toggle="tooltip" title="Select all"> All &nbsp  &nbsp  &nbsp  &nbsp  &nbsp Product</th> 
                <th>Variation</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>  </th>
                <th><li type="button" data-url="<?php echo e(url('select')); ?>" class="delete-button text-success" ><span type="button"  class="edit">  <u> Edit </u> </span> </li>    </th> 
                <th>  </th>
        </tr>
        </thead>
        <tbody>
       
    <?php $__currentLoopData = $store_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
        <tr > 
            <td  style=" width: 245px;" id="delete-by-store<?php echo e($store->sID); ?>">
            <div  class="text-left"  >
  
              <input type="checkbox" id="shogun<?php echo e($store->sID); ?>" value="<?php echo e($store->sID); ?>" style="margin-top:20px; color: lightgray;" data-toggle="tooltip" title="Select">
              <a href="/shop/"> <span style="color: black; font-size: 12pt; font-weight: 500; text-transform: uppercase" data-toggle="tooltip" title="Visit store">  <?php echo e($store = $store->store_name); ?> </a>   &nbsp &nbsp&nbsp<i class="fa fa-comments-o text-success" style="font-size: 14pt;" aria-hidden="true"></i></span> 
       </div>
       </td>

    <?php
    $carts = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
        ->leftjoin('users_tb', 'users_tb.id', '=', 'order_tb.sID')
        ->where('order_tb.oStat', $x)
        ->where('order_tb.uID', $uID) 
        ->where('users_tb.store_name', $store)
        ->orderby('order_tb.updated_at', 'DESC')
        ->get();
        
    
    ?>
            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
            <tr  class="nomargin<?php echo e($cart->sID); ?>" style="color: black; font-size: 10pt; font-weight: normal; " >   
                        <td class="inline<?php echo e($cart->sID); ?>"  data-th="Product"  >   
                            <a href="/onclick/<?php echo e($cart->pID); ?> ">  
                                <div class="row text-left" > 
                                    <div class="col-sm-1 hidden-xs"> 
                                     
                                    <input type="checkbox" name="oID"    id="sub_check<?php echo e($cart->sID); ?>" class="sub_check  sub_checked<?php echo e($cart->sID); ?>"  data-url="<?php echo e(url('myproductsDeleteAll')); ?>" data-id="<?php echo e($cart->oID); ?>" style="  margin-top: 20px;" data-toggle="tooltip" title="Select" > </p>
                                        
                                        <p style=" margin-left: 30px; margin-top: -35px;"> <img  src=" <?php echo e(URL::asset('/products/'.$cart->pdImg  )); ?> "  width="50" height="50" class="img-responsive"/>  </p>
                                        <p style=" margin-left: 90px; margin-right: -21px; margin-top: -50px;  width: 148px; color: black; font-size: 10pt; font-weight: normal;" ><?php echo e($cart->pdNam); ?> </p> 
                                    </div>
                                </div>
                            </a>
                        </td>
                 
<!--------------------------------- VARIATION ----------->
                <td > <p  style="margin-top: 10px;"> 
                    
                <?php
                    $uID = Auth()->user()->id; 

                $x = "x" ;
                $u = "u"  ;


                    $try =  Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                    ->leftjoin('users_tb', 'users_tb.id', '=', 'prdt_tb.uID')
                    ->where('order_tb.oStat', $x)
                    ->where('users_tb.store_name', $store)
                    ->where('order_tb.uID', $uID)
                    ->get();
                    ?>

                  
                    <select name="" id="" style="width:100px; height: 30px; border: solid lightgray 1px; color: black"> 
                        <?php $__currentLoopData = $try; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value=""><?php echo e($tries->sID); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>          
                
                </p>  </td>

<!--------------------------------- VARIATION ----------->

                    <td data-th="Price" > <p style="margin-top: 20px;"> ₱ <?php echo e($cart->pdPrc); ?>  </p> </td>
                    <td data-th="Quantity">
                                <form method="GET" action="<?php echo e(route('add.to.cart', $cart->pID)); ?>" enctype="multipart/form-data">
                                    <div class="number-input"  style="margin-left: 13%;">
                                        <button type="submit" onclick="this.parentNode.querySelector('input[type=number]').stepDown(1)" data-toggle="tooltip" title="Decrease"></button>
                                        <input id="myNumber" class="oQty" min="0" max="10000" name="oQty" value="<?php echo e($cart->oQty); ?>" type="number" style="color: black; font-size: 12pt; font-weight: lighter; " readonly>
                                        <button type="submit"  onclick="this.parentNode.querySelector('input[type=number]').stepUp(1); " class="plus" data-toggle="tooltip" title="Increase"></button>     
                                    </div>
                                                        
                                </form> 
                    </td>
                    <td data-th="Subtotal"  class="text-center"> <p style="margin-top: 20px;">  ₱ <?php echo e($cart->pdPrc  * $cart->oQty); ?> </p></td>
                    <th> 
                    <td class="actions" data-th="<?php echo e($cart->oID); ?>"> 
                    <li type="button"  onclick="executeExample<?php echo e($cart->oID); ?>('normalAlert')" class="btn btn-danger btn-md remove-from-cart <?php echo e($cart->oID); ?>"  data-toggle="tooltip" title="Remove"> <i class="fa fa-trash"></i></li> </td>
                
</p>
              
              <script>    
                    $(document).ready(function () {
                        loadcout();
                        
                        function loadcout(){
                        $.ajax({
                                type: "GET", 
                                url: "/load-cout-data",
                                success: function(response){
                                    $('.cout-count').html('');
                                    $('.cout-count').html(response.bilang);
                                }
                            });
                        }

                        $('.checktBtn<?php echo e($cart->oID); ?>').click(function (e){
                            e.preventDefault();
                            
                        var cout = $(this).closest('.checkoutBTN').find('.cout').val();

                            $.ajax({
                                type: 'GET',
                                data: {
                                        'cout': cout, 
                                        },
                                        success: function(response){
                                            Swal.fire({
                                            icon: 'success',
                                            title: 'Added to checkout list!',
                                            confirmButtonColor: '#00FF00',
                                        });   
                                        $('#bakit').load(location.href+(' #bakit'));
                                        loadcout();
                                        $('#my-datatable').load(location.href+('#my-datatable'));
                                    
                                    } 
                                });
                            });


// SELECT BY STORE NAME //

        $('#shogun<?php echo e($cart->sID); ?>').on('click', function(e) {

            var allVals = [];  

         if($(this).is(':checked',true))  
         {
           

            $('input:checkbox').filter('#sub_check<?php echo e($cart->sID); ?>').prop('checked', true).each(function() {  
                    allVals.push($(this).attr('data-id'));
                });  
                var join_selected_values = allVals.join(","); 

                $.ajax({
                    type: 'GET',
                    url: "/cart-details",
                    data: 'oID='+join_selected_values,
                            success: function(response){

                                $('#my-datatable').html('<img src="https://cdn.dribbble.com/users/2077073/screenshots/6005120/loadin_gif.gif" width="200px"/>  ');
                            
                                    $('#my-datatable').load(location.href+(' #my-datatable'));
                                    $('#bakit').load(location.href+(' #bakit'));
                                    loadcout();
                        }
                    });
        } else {  
          
           
                var allVals = [];  
                $('input:checkbox').filter('#sub_check<?php echo e($cart->sID); ?>').prop('checked', false).each(function() {   
                allVals.push($(this).attr('data-id'));
                  });  
              
                    var join_selected_values = allVals.join(","); 

                    $.ajax({
                        url: $(".sub_check").data('url'),
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'oID='+join_selected_values,
                        success: function(data) {
                            $('#boss').prop('checked',false);  
                            $('#my-datatable').html('<img src="https://cdn.dribbble.com/users/2077073/screenshots/6005120/loadin_gif.gif" width="200px"/>  ');
                            $('#my-datatable').load(location.href+(' #my-datatable'));
                            $('#bakit').load(location.href+(' #bakit'));
                            loadcout();
                          

                                    }

                                }); 
                            }  
                                            
                        });
                    });

                                                
                </script> 



                <script>
                        function executeExample<?php echo e($cart->oID); ?>() {
                            Swal.fire({
                                title: 'Are you sure?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#00FF00',
                                cancelButtonColor: '#d33',
                                confirmButtonText: '<a href="/delete/<?php echo e($cart->oID); ?>" style="color:white">  Yes, delete it!  </a>' 
                            })
                        };

                </script>
                </td> 

<!----------------------------- Delete select script ------------------->              
<script>
            $(document).ready(function () {

            $('.delete-button').on('click', function(event) {
                // $(".sub_check").attr("disabled", true);       
            
                    $('.edit').html('<span type="button" class="text-danger" id="remove"  data-url="<?php echo e(url('Removefromtable')); ?>"  data-toggle="tooltip" title="Delete"><i class="fa fa-trash" style="font-size: 18pt" ></i></span><span type="button" id="cancel" class="cancel" data-toggle="tooltip" title="Cancel"> <i class="fa fa-times" style="font-size: 18pt"></i>  </span> ');  
                    $('#delete-by-store<?php echo e($cart->sID); ?>').html(' <div class="text-left"> <input type="checkbox" id="store<?php echo e($cart->sID); ?>"  style="margin-top:20px; color: lightgray;" data-toggle="tooltip" title="delete">  <a href="/shop/"> <span style="color: black; font-size: 12pt; font-weight: 500; color: red;  text-transform: uppercase" data-toggle="tooltip" title="Visit store">  <?php echo e($store); ?> </a>   &nbsp &nbsp&nbsp<i class="fa fa-comments-o text-success" style="font-size: 14pt; " aria-hidden="true"></i></span> </div>  ');  
                   
            
                    $('.cancel').click( function(event) { 
                        
                    $('#my-cart').load(location.href+(' #my-cart'));
                    });

                $('#store<?php echo e($cart->sID); ?>').on('click', function(e) { 

                    var allVals = [];  

                    if($(this).is(':checked',true))   {
                        $('input:checkbox').filter('.sub_checked<?php echo e($cart->sID); ?>').prop('checked', true).each(function() {  
                            allVals.push($(this).attr('data-id'));
                        });  
               
                       var join_selected_values = allVals.join(","); 

                     
              
                     } else {  

                          $('input:checkbox').prop('checked', false); 
                    } 
                    
                    
                    $('#remove').click(function(e) { 
                    $.ajax({
                            url: $("#remove").data('url'),
                            type: 'GET',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'oID='+join_selected_values,
                            success: function(data) {
                                Swal.fire({
                                title: 'Are you sure?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#00FF00',
                                cancelButtonColor: '#d33',
                                confirmButtonText: '  Yes, delete it!' 
                            })

                            $('#my-cart').load(location.href+(' #my-cart'));
                                        
                            }
                         });
                        });
                    });
                    

            

                    $('.sub_checked<?php echo e($cart->sID); ?>').on('click', function(e) {
                        var allVals = [];  
                        
                            if($(this).is(':click',true))  {

                                $(".sub_checked<?php echo e($cart->sID); ?>:checked").each(function() {  
                                    allVals.push($(this).attr('data-id'));
                            });
                                
                                var join_selected_values = allVals.join(","); 

                                    $.ajax({
                                        url: $("#remove").data('url'),
                                        type: 'GET',
                                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                        data: 'oID='+join_selected_values,
                                        success: function(data) {

                                            $('#my-cart').load(location.href+(' #my-cart'));
                                


                                        }
                                    });

                                } else {  
                    
                             $('input:checkbox').prop('checked', false); 

                

                        
                                }  

                            });

                            

                        });

                    });
           

            </script>   

<!------------ end of script ----------------->
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </tr>
                </tr>   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
         </tbody>
    </table>   
</section>
        </div>


<!----------- CHECKLIST ------>


        <div class="col-5 col-md-4 bg-white border shadow p-3 mb-5 bg-white rounded" style="padding-bottom: 20px;" >  <br>
        <tr>
            <th > &nbsp &nbsp <input type="hidden" class= "cout"  value="u">   <input type="hidden" id="master" style="margin-top:20px"> </th> 
             </tr>
             <H4 style="color: black"> <Center>  CHECKOUT LIST  </Center> </p>

             <th><li type="button" style="" class=" btn btn-danger delete_all float-right" data-url="<?php echo e(url('myproductsDeleteAll')); ?>"  data-toggle="tooltip" title="Remove all"><i class="fa fa-trash"></i> </li>  </th> 

                    <div class="row cart-detail"  style=" margin-left: 1px; overflow-y: auto ; width: 100%; height: 290px">
                        <table id= "my-datatable" class=" table " style="height: 5px;">
                           
                        <?php $total = 0 ?>
                        <?php $__currentLoopData = $checklist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php $total += $list->pdPrc * $list->oQty ?> 
                           
                          <tr id="tr_<?php echo e($cart->oID); ?>">
                          <td  class=" price text-left">  <span> <?php echo e($list->pdNam); ?>  </span>    </td>
                                    <td> &nbsp &nbsp  <input type="hidden" class="sub_chk" data-url="<?php echo e(url('myproductsDeleteOne/')); ?>"  data-id="<?php echo e($list->oID); ?>"></td>  
                                  
                                    <td class="text-right" >
                                    <span class=" price text-right ">  <?php echo e($list->oQty); ?>x </span>   
                                    <span class=" price text-right "> ₱ <?php echo e($list->pdPrc); ?> </span> 
                                   
                                        <a href="<?php echo e(url('myproducts',$list->oID)); ?>" 
                                                data-tr="tr_<?php echo e($list->oID); ?>"
                                                data-toggle="confirmation"
                                                data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                                                data-btn-ok-class="btn btn-sm btn-danger"   data-toggle="tooltip" title="Remove">
                                            <span style="font-size: 12px; color: red;"> &nbsp x  &nbsp </span>
                                         </a>
                                    </td>
                                   

                                </tr> 
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                             </table> 
                             
                             
                            
                           
                     </div> 
                     <hr>
                     <td> <p class="text-right">  Total: ₱
                    <span  id="bakit" style="color: red;"> <?php echo e($total); ?> </p> </span>
                    </td>
                   

      
                      
                    <td> <button type="button" class="btn btn-primary checktBtn float-right " data-toggle="tooltip" title="Checkout">  
                        <a href="<?php echo e(route('checklist')); ?>" style="color:white" > CHECKOUT  <span  class="badge badge-pill badge-danger cout-count">0</span> 
                        </a></button>
                    </td> 
                    
              
                     </div>
      
                     


    
    
    <script type="text/javascript">
    $(document).ready(function () {
        loadcout();

        function loadcout(){
        $.ajax({
                type: "GET", 
                url: "/load-cout-data",
                success: function(response){
                    $('.cout-count').html('');
                    $('.cout-count').html(response.bilang);
                }
            });
        }

        $(".sub_check").on('click', function(e) {

            var allVals = [];  
      
            
            if($(this).is(':checked',true))  {
    
            $(".sub_check:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });
            
            var join_selected_values = allVals.join(","); 


            $.ajax({
                url: "/cart-details",
                type: 'GET',
              
                data: 'oID='+join_selected_values,
                        success: function(response){
                        $('#my-datatable').html('<img src="https://cdn.dribbble.com/users/2077073/screenshots/6005120/loadin_gif.gif" width="200px"/>   ');

                        $('#my-datatable').load(location.href+(' #my-datatable'));
                                $('#bakit').load(location.href+(' #bakit'));
                                loadcout();
                            }                 
                    });
         } else {             
             
            var allVals = [];  
        
                    var join_selected_values = allVals.join(","); 

                    
                        $.ajax({
                            url: $(".sub_check").data('url'),
                            type: 'GET',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data:{
                                oID: $(this).attr("data-id")  
                            },
                            success: function(data) {
                                $('#boss').prop('checked',false);  
                                $('#my-datatable').html('<img src="https://cdn.dribbble.com/users/2077073/screenshots/6005120/loadin_gif.gif" width="200px"/>  ');
                                $('#my-datatable').load(location.href+(' #my-datatable'));
                                $('#bakit').load(location.href+(' #bakit'));
                                loadcout();

                     }

                    }); 
            }  
          
        });

 // ________

        $('#boss').change( function(e) {
         if($(this).is(':checked',true))  
         {
            $('input:checkbox').prop('checked', true); 

                var allVals = [];  
                $(".sub_check").each(function() {  
                    allVals.push($(this).attr('data-id'));
                });  
                var join_selected_values = allVals.join(","); 

                $.ajax({
                    type: 'GET',
                    url: "/cart-details",
                    data: 'oID='+join_selected_values,
                            success: function(response){

                            $('#my-datatable').html('<img src="https://cdn.dribbble.com/users/2077073/screenshots/6005120/loadin_gif.gif" width="200px"/>  ');                       
                            $('#my-datatable').load(location.href+(' #my-datatable'));
                            $('#bakit').load(location.href+(' #bakit'));
                            loadcout();
                        }
                    });
        } else {  
          
            $('input:checkbox').prop('checked', false); 

                var allVals = [];  
                $(".sub_check").prop('checked',false).each(function() {  
                allVals.push($(this).attr('data-id'));
                  });  
              
                    var join_selected_values = allVals.join(","); 

                    $.ajax({
                        url: $(".sub_check").data('url'),
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'oID='+join_selected_values,
                        success: function(data) {

                            $('#my-datatable').html('<img src="https://cdn.dribbble.com/users/2077073/screenshots/6005120/loadin_gif.gif" width="200px"/>  ');
                            $('#my-datatable').load(location.href+(' #my-datatable'));
                            $('#bakit').load(location.href+(' #bakit'));
                            loadcout();

                                        }

                                    }); 
                            }  
                          
                        });

// -------------------
      
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });


        $('.delete_all').click(function (e){
            e.preventDefault();

            var allVals = [];  
            $(".sub_chk").prop('checked',false).each(function() {  
                allVals.push($(this).attr('data-id'));
            });  
                    var join_selected_values = allVals.join(","); 

                        $.ajax({
                            url: $(this).data('url'),
                            type: 'GET',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'oID='+join_selected_values,
                            success: function(data) {

                                $('#my-datatable').html('<img src="https://cdn.dribbble.com/users/2077073/screenshots/6005120/loadin_gif.gif" width="200px"/>  ');
                                $('#my-datatable').load(location.href+(' #my-datatable'));
                                $('#bakit').load(location.href+(' #bakit'));
                                loadcout();
                                $('input:checkbox').prop('checked',false);  


                            }
                        });
                     
                     
                    });  
                });
          

</script>


<?php endif; ?>  

<div class="container col-lg-12 bg-white border shadow p-3 mb-5 bg-white rounded">
<h5>  </h5>
<div class="container  bg-white "  > <br> <div class="cat">You may also like
      <div class="container bg-white " style="padding: 2rem;" >     </div></div>  
            <div class="row">
          
            <?php
           
            $products = Product::all()->where('pdType', '1');
            ?> 

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
            </div>  </div>
</div>

 


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\breym\mxm_proj\resources\views/users/cart.blade.php ENDPATH**/ ?>