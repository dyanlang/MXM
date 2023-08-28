
<?php $__env->startSection('title', 'MXM | Enjoy Shopping!'); ?>
<?php $__env->startSection('content'); ?>

<?php
use App\Models\Order;
use App\Models\Product;
?>


<div class="container-fluid">
<?php if($search == null): ?>

    <h1> We're sorry we don't have what you've been looking for! </h1>

<?php endif; ?>

                      
                      
                        <br>
                  
    <div class="row">
<!-------- for filter ------------>


        <div class="col-3  col-md-3 rounded" style="font-weight: normal; margin-bottom: 12px;">

            <div >
              
                <div class="border-bottom pb-2 ml-2">
                    <h4 id="burgundy"> <i class="fa fa-filter" aria-hidden="true"></i>  Search Filter </h4>
                </div>
            </div>


        <div class="py-2 border-bottom ml-3" >
        <h6 > By Categories</h6>
<!----------- foreach -------------->
            <?php
                $data = Product::where('pdNam', 'like', '%' . $search . '%')
                    ->where('pdType', '1')
                    ->get();

            ?>

  
<!----------- foreach -------------->

<form>
    <div class="form-group"  style=" padding-left: 22px;" >
        <label for="artisan">
            <ul class="navbar-nav ml-auto toogood" > 
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($p =  $x->pdCat); ?> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(empty($p)): ?>
                    // category doesn't exist
                
                <!-- BABY & KIDS -->

                    <?php elseif(  $p == 'B1' ): ?>   
                        
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B1001">   Babies & Kids     </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B1002">   Baby Detergent	 </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B1003">   Babies' Fashion   </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B1004">   Rain Gear         </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B1005">   Nursery           </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B1006">   Moms & Maternity  </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B1007">   Baby Gear         </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B1008">   Healli & Safety   </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B1009">   Bali & Skin Care  </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B10010">  Boy's Fashion     </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B10011">  Girls' Fashion    </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B10012">  Feeding & Nursing </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B10013">  Diapers & Wipes   </li>
                        <li>    <input type="checkbox"  name="Pdsub1[]" class="artisan" value="B10014">  Others            </li>
                        <hr>

             <!-- CAMERA -->
                        <?php elseif(  $p == 'C1'): ?>
                                    
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="C1001" >   Car / Dash Camera </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="C1002" >   Drones	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="C1003" >  CCTV / IP Camera   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="C1004" >   Action Camera     </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="C1005" >   Digital Camera    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="C1006" >   Others  </li>
                        
                    

            <!-- GAMING -->
                        <?php elseif(  $p == 'G1'): ?>
                                    
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G1001" >   Computer Gaming </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G1002" >   Mobile Gaming	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G1003" >  Console Gaming   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G1004" >   Others     </li>

                

            <!--Groceries   -->
                        <?php elseif(  $p == 'G2'): ?>
                                    
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G2001" >   Seasoning,Staple Foods & Baking Ingredients </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G2002" >   Gift Set & Hampers	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G2003" >   Dairy & Eggs   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G2004" >   Cigarettes     </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G2005" >   Superfoods & Healthy Foods </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G2006" >   Breakfast Food	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G2007" >   Snack & Sweets  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G2008" >   Frozen & Fresh foods     </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G2009" >   Alcholic Beverages</li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G20010" >  Laundry & Household Care	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G20011" >  Beverages   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="G20012" >  Others     </li>
                    

            <!-- WOMEN'S APPAREL -->

                        <?php elseif(  $p == 'W1'): ?>
                                    
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W1001" >   Dresses             </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W1002" >   Tops	            </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W1003" >   Tees                </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W1004" >   Shorts              </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W1005" >   Pants               </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W1006" >   Jeans	            </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W1007" >   Skirts              </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W1008" >   Jumpsuits & Rompers  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W1009" >   Lingerie & Nightwear </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W10010" >  Sets	             </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W10011" >  Swimsuit             </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W10012" >  Jackets & Outerwear  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W10013" >   Plus Size           </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W10014" >   Sweater & Cardigans </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W10015" >   Maternity Wear      </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W10016" >   Socks & Stockings   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W10017" >   Costumes            </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W10018" >   Traditional Wear	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W10019" >  Fabric               </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W10020" >   Others              </li>

                

            <!-- WOMEN'S ACCESORIES -->
                        <?php elseif(  $p == 'W2'): ?>
                                    
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W2001" >   Jewelry </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W2002" >   Watches	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W2003" >   Hair Accesories   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W2004" >   Eyewear    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W2005" >   Wallets & Pouches </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W2006" >   Hats & Caps	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W2007" >   Belts & Scarves  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W2008" >   Fine Jewelry     </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W2009" >   Gloves </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W20010" >  Accesories Sets & Packages	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W20011" >  Additional Accesories   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W20012" >  Watch & Jewelry Organizers     </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W20013" >  Others     </li>
                    
            <!-- WOMEN'S BAG -->
                        <?php elseif(  $p == 'W3'): ?>
                                    
                                    <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W3001" >   Shoulder Bags </li>
                                    <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W3002" >   Tote Bags	 </li>
                                    <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W3003" >   Handbags   </li>
                                    <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W3004" >   Clutches    </li>
                                    <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W3005" >   Backpacks </li>
                                    <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W3006" >   Drawstrings	 </li>
                                    <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W3007" >   Accessories  </li>
                                    <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W3008" >   Others     </li>
                
            <!-- WOMEN'S SHOES -->

                        <?php elseif(  $p == 'W4'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W4001" >   Flats </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W4002" >   Heels	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W4003" >   Flip Flops   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" class="artisan" value="W4004" >   Sneakers    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="W4005" >   Weadges & Platforms </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="W4006" >   Boots	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="W4007" >   Shoe Care & Accessories  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="W4008" >   Others     </li>
            
            <!-- Make up & fragrances -->
                        <?php elseif(  $p == 'M1'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M1001" >   Palettes & Makeup Sets </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M1002" >   Tools & Accessories	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M1003" >   Nails   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M1004" >   Fragrances    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M1005" >   Face Makeup </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M1006" >   Lip Makeup	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M1007" >   Eye Makeup  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M1008" >   Others     </li>
                    
            <!-- Men's Apparel -->
                        <?php elseif(  $p == 'M2'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M2001" >   Tops </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M2002" >   Shorts	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M2003" >   Pants   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M2004" >   Jeans    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M2005" >   Underwear </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M2006" >   Socks	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M2007" >   Hoodies & Sweatshirts  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M2008" >   Jacket & Sweaters </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M2009" >   Sleepwear	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M20010" >   Suits   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M20011" >   Sets    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M20012" >   Occupational Attire </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M20013" >   Traditional Wear	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M20014" >   Costumes  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M20015" >   Others     </li>
                    

            <!-- Men's Shoes   -->
                        <?php elseif(  $p == 'M3'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M3001" >   PLoafer & Boat Shoes </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M3002" >   Sneakers	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M3003" >   Sandals & Flip Flops   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M3004" >   Boots    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M3005" >   Formal </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M3006" >   Shoe Care & Accessories	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M3007" >   Others  </li>
                

            <!--Men's Bags and Accesorie   -->
                        <?php elseif(  $p == 'M4'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M4001" >   Hats & Caps </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M4002" >   Wallets	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M4003" >   Eyewear   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M4004" >   Accessories    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M4005" >   Jewelry </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M4006" >   Watches	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M4007" >   Men's Bags  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M4008" >   Others   </li>


            <!--Mobile Accesories   -->
                        <?php elseif(  $p == 'M5'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M5001" >   Mobile Accessories </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M5002" >   Attachments	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M5003" >   Cases & Covers   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M5004" >   Others   </li>
                            
                

            <!-- Motors	 -->
                        <?php elseif(  $p == 'M6'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M6001" >   Car Care & Detailing  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M6002" >   Automotive Parts	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M6003" >   Engine Parts   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M6004" >   Ignition    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M6005" >   Exterior Car Accessories </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M6006" >   Oils, Coolants, & Fluids	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M6007" >   Car Electronics  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M6008" >   Moto Riding & Protective Gear </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M6009" >   Tools & Garage	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M60010" >   Motorcycle Accessories   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M60011" >   Motorcycle & ATV Parts    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M60012" >   Interior Car Accessories </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M60013" >   Others     </li>
                
            <!-- Mobile & Gadgets -->
                        <?php elseif(  $p == 'M7'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M7001" >   Portable Audio  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M7002" >   Wearables	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M7003" >   E-Cigarettes   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M7004" >   Tablets    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M7005" >   Mobiles </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="M7006" >   Others     </li>
                    
            <!-- Health & Personal Care -->
                        <?php elseif(  $p == 'H1'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H1001" >   Sexual Wellness </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H1002" >   Medical Supplies	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H1003" >   Men's Grooming   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H1004" >   Health Supplements    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H1005" >   Slimming </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H1006" >   Suncare     </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H1007" >   Whitening </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H1008" >   Personal Care	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H1009" >   Bath & Body   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H10010" >  Hair Care    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H10011" >  Skin Care </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H10012" >  Others     </li>
                
            <!-- Hobbies & stationaries -->
                        <?php elseif(  $p == 'H2'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H2001" >   E-Books </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H2002" >   Books and Magazines	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H2003" >   Paper Supplies   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H2004" >   Writing Materials    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H2005" >   Religious Artifacts </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H2006" >   Packaging & Wrapping     </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H2007" >   Arts & Crafts </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H2008" >   School & Office Suppliese	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H2009" >   Musical Instruments   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H20010" >  Others   </li>
                    
            <!-- Home Entertainment -->
                        <?php elseif(  $p == 'H3'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H3001" >   Audio & Video </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H3002" >   Speakers and Karaoke	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H3003" >   Projectors   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H3004" >   TV Accessories    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H3005" >   Television </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H3006" >   Others    </li>
                    
            <!-- Home Living -->
                        <?php elseif(  $p == 'H4'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4001" >   Hand Warmers, Hot Water Bags & Ice Bags </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4002" >   Home Maintenance	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4003" >   Seasonal Decor   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4004" >   Furniture    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4005" >   Lighting </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4006" >   Party Supplies    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4007" >   Beddings </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4008" >   Bath	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4009" >   Glassware & Drinkware   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H40010" >  Dinnerware   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H40011" >  Bakeware </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H40012" >   Kitchenware </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H40013" >   Sinkware	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H40014" >   Power Tools   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H40015" >   Home Improvement   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H40016" >   Storage & Organization </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H40017" >   Home Decor    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H40018" >   Garden Decor </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H40019" >  Outdoor & Garden	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H40020" >   Others    </li>
                    

            <!-- Home Appliances	(forgot to include) -->
                        <?php elseif(  $p == 'H5'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4001" >   Small Household Appliances </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4002" >   Home Appliance Parts & Accessories	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4003" >   Large Appliances   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4004" >   Vacuum Cleaners & Floor Care    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4005" >   Humidifier & Air Purifier </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4006" >   Cooling & Heating    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4007" >   Specialty Appliances </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4008" >   Small kitchen Appliances	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H4009" >   Garment Care   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="H40010" >  Others   </li>
                    
            <!-- Toys, games & collectibles -->
                        <?php elseif(  $p == 'T1'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="T1001" >   Celebrity Merchandise </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="T1002" >   Dress Up & Pretend	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="T1003" >   Blasters & Toy Guns   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="T1004" >   Sports & Outdoor Toys    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="T1005" >   Dolls </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="T1006" >   Educational Toys    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="T1007" >   Electronic Toys </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="T1008" >   Boards & Family Games	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="T1009" >   Collectibles   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="T10010" >  Character   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="T10011" >  Action Figure   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="T10012" >  Others   </li>
                

            <!-- Sports & travel -->

                        <?php elseif(  $p == 'S1'): ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S1001" >   Travel Bags </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S1002" >   Travel Accessories	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S1003" >   Travel Organizer  </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S1004" >   Kid's Activewears    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S1005" >   Boxing & MMA </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S1006" >   Weather Protection    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S1007" >   WinterSports Gear </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S1008" >   Outdoor Recreation	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S1009" >   Leisure Sports & Game Room   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10010" >  Golf   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10011" >  Racket Sports   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10012" >  Sports Bags   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10013" >   Women's Activewear </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10014" >   Men's Activewear	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10015" >   Cycling, Skates & Scooters   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10016" >   Team Sports    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10017" >   Water Sports </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10018" >   Camping & Hiking    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10019" >   Weightlifting </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10020" >   Fitness Accessory	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10021" >   Yoga   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10022" >  Exercise & Fitness   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="S10023" >  Others   </li>
                    
            <!-- Pet Care -->
                        <?php else: ?>
                            
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="P1001" >   Toys & Accessories </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="P1002" >   Litter & Toilet	 </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="P1003" >   Pet Essentials   </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="P1004" >   Pet Clothing & Accessories    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="P1005" >   Pet Grooming Supplies </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="P1006" >   Pet Toys & Accessories    </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="P1007" >   Pet Food & Treats </li>
                            <li>    <input type="checkbox" name="Pdsub1[]" id="artisan" value="P1008" >   Others	 </li>
                        <?php endif; ?>
"


            

                </ul>     
            </label>
        </div>                                    
    </form>
    <input type="hidden" name="res" value="<?php echo e($search); ?>"> 

</div>
<!-- By Price
        <div class="py-2  border-bottom ml-3" >
               <h6 > By Price </h6>
      </div>

By Rating
      <div class="py-2  border-bottom ml-3" >
        <h6 > By Rating </h6>

        
        <ul class="navbar-nav ml-auto" style="padding-left: 22px" >  
            <li type="button" class="" name="loc[]" id="location" data-value="Palasan, Valenzuela City" >  5 stars
                <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star  text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star text-warning star-light mr-1 main_star"></i>        
            </li>
            <li type="button" class="" name="loc[]" id="location" value="North" >   4 stars	
                <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star  text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
             </li>
            <li type="button" class="" name="loc[]" id="location" value="South" >   3 stars
                <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star  text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
             </li>
            <li type="button" class="" name="loc[]" id="location" value="Visayas" >  2 stars
                <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                <i class="fa fa-star text-secondary star-light mr-1 main_star"></i> 
             </li>
            
            <li type="button" class="" name="loc[]" id="location" value="Mindanao" >  1 star
                <i class="fa fa-star text-warning star-light mr-1 main_star"></i>
                <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>
                <i class="fa fa-star text-secondary star-light mr-1 main_star"></i>        
            </li>
        </ul>

    </div>


Shipped From
<div class="py-2  border-bottom ml-3" >
        <h6 > Shipped From </h6>
            <ul class="navbar-nav ml-auto" style="padding-left: 22px" >  
                    <li>    <input type="checkbox" name="loc[]" class="location" value="Palasan,Valenzuela City" >   Metro Manila </li>
                    <li>    <input type="checkbox" name="loc[]" class="location" value="North" >   North Luzon	 </li>
                    <li>    <input type="checkbox" name="loc[]" class="location" value="South" >   South Luzon   </li>
                    <li>    <input type="checkbox" name="loc[]" class="location" value="Visayas" >   Visayas    </li>
                    <li>    <input type="checkbox" name="loc[]" class="location" value="Mindanao" >   Mindanao </li>
            </ul>
    </div> -->


</div>



<script>
$(document).ready(function() {
    $(".artisan").on('click', function(e) {

        var allVals = [];  

        var counter = 0;
        
        $(".artisan").each(function () {
            if ($(this).is(":checked", true)) {
                allVals.push($(this).attr('value'));
                counter++;
            }
        });

        $('._t-item').text('(' + allVals.length + ' items)');

        if (counter == 0) {
            $('.causes_div').empty();

            $('.causes_div').append(`  
                    <div class="row"  id="my-datatable">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $sold = Order::where('oStat', 'c')
                        ->where('pID', $p )
                        ->sum('oQty'); 
                        ?>

                        <div id="xup" class="box"  >
                        <div class="box-img" style="padding: 2px; margin: 3px; ">
                        <a href="/onclick/<?php echo e($p->pID); ?> ">     
                            <div class=""  > 
                                <img  src="products/<?php echo e($p->pdImg); ?>" alt="Card image cap" height="210"> 
                                        <h6 style="font-weight: lighter; color: black"  class="square" style=" width:50;" ><?php echo e($p->pdNam); ?></p>
                                        <h6 id="view" style="margin-top:-7%;"> ₱ <?php echo e($p->pdPrc); ?></h6>
                                        <h id="view" style="font-size:10pt;" > Sold: <?php echo e($sold); ?> </h> </h6>    </a>
                                </div>
                            </div>
                        </div>
                 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        `);
                } else {
                    fetchCauseAgainstCategory(allVals);
                }
            });
// --------------------

        function fetchCauseAgainstCategory(allVals) {

            var Pdsub1 = allVals.join(","); 
         
            var search =  $('input[name="res"]').val();


            $('.causes_div').empty();
            $.ajax({
                type: 'GET',
                url: '/search_filter/',
                data: {  Pdsub1 ,

                         search },

                success: function (response) {
                    var response = JSON.parse(response);

                    if (response.length == 0) {
                        $('.causes_div').html(`
  
                        <article>
                          <center> <img src="https://www.frooition.com/blog/wp-content/uploads/2017/05/45d64f50cefa2963667dfb094c1cb1e5.png">
                          <h3 style="color:gray"> We're sorry seems like we don't have what you're looking for. Please try again with another keyword! </center></h3>
                        </article>`);
                    } else {
                        response.forEach(element => {
                            $('.causes_div').append(`
        
                                    <div id="xup" class="box" >
                                    <div class="box-img" style="padding: 6px;  margin: 3px;">
                                    <a href="/onclick/${element.cat_id}">     
                                    
                                            <div class=""  > 
                                            <?php
                                    $sold = Order::where('oStat', 'c')
                                
                                    ->sum('oQty'); 
                                    ?>

                                        <img  src="products/${element.cat_image}" alt="Card image cap" height="210"> 
                                                <h6 style="font-weight: lighter; color: black"  class="square" style=" width:50;" > ${element.cat_pdNam}</p>
                                                <h6 style="color: green; margin-top:-7%; "  >  ₱ ${element.pdPrc} </h6>
                                                <h id="view" style="float:right; font-size:10pt;" >Sold:  <?php echo e($sold); ?> </h> </h6>     </a>


                                            </div>
                        
                        </div>`);

                        });
                    }
                }
            });
        }


$('.rating').click(function (e){

    $('.pop').html(' <span class="btn btn-primary btn-sm  popularity" value="popularity"><b>Popularity</b></span> ');  

     
        var search =  $('input[name="res"]').val();
             
          $.ajax({
            type: 'GET',
            url: "/search_filter_byPopularity",
            data: {search, 
                 },
            success: function (response) {
                    var response = JSON.parse(response);

                    if (response.length == 0) {
                        $('.causes_div').append('Wla');
                    } else {
                     
                        $('.causes_div').html('');
                        response.forEach(element => {
                        $('.causes_div').append(`
                         
                        <div id="xup" class="box" >
                        <div class="box-img" style="padding: 6px;  margin: 3px;">
                        <a href="/onclick/${element.cat_id}">     
                        
                                <div class=""  > 
                                <?php
                        $sold = Order::where('oStat', 'c')
                       
                        ->sum('oQty'); 
                        ?>

                            <img  src="products/${element.cat_image}" alt="Card image cap" height="210"> 
                                    <h6 style="font-weight: lighter; color: black"  class="square" style=" width:50;" > ${element.cat_pdNam}</p>
                                    <h6 style="color: green; margin-top:-7%; "  >  ₱ ${element.pdPrc} </h6>
                                    <h id="view" style="float:right; font-size:10pt;" >Sold:  <?php echo e($sold); ?> </h> </h6>     </a>


                                </div>
                        
                        </div>`);

                        });
                    }
                }
            });
        });

        $('.price').click(function (e){

        $('.price').html(' <span class="btn btn-primary btn-sm  popularity" value="popularity"><b>Price </b></span> ');  

 
    var search =  $('input[name="res"]').val();
         
      $.ajax({
        type: 'GET',
        url: "/search_filter_byPrice",
        data: {search, 
             },
        success: function (response) {
                var response = JSON.parse(response);
                $('.causes_div').html(' ');
                if (response.length == 0) {
                    $('.causes_div').append(`<h1 style="color:gray; margin-top: 10%;"> <center>We're sorry seems like we don't have result for the keyword you're looking for! <br> Please try again. <br> Thank you! </center> </h1>`);
                } else {

                  
                    response.forEach(element => {
                    $('.causes_div').append(`
                     
                    <div id="xup" class="box" >
                    <div class="box-img" style="padding: 6px;  margin: 3px;">
                    <a href="/onclick/${element.cat_id}">     
                    
                            <div class=""  > 
                            <?php
                    $sold = Order::where('oStat', 'c')
                   
                    ->sum('oQty'); 
                    ?>

                        <img  src="products/${element.cat_image}" alt="Card image cap" height="210"> 
                                <h6 style="font-weight: lighter; color: black"  class="square" style=" width:50;" > ${element.cat_pdNam}</p>
                                <h6 style="color: green; margin-top:-7%; "  >  ₱ ${element.pdPrc} </h6>
                                <h id="view" style="float:right; font-size:10pt;" >Sold:  <?php echo e($sold); ?> </h> </h6>     </a>


                            </div>
                    
                    </div>`);

                    });
                }
            }
        });
    });
});

</script>

       
                   
<!-------- for results ------------>

        <div class=" col-12 col-md-9 bg-white  rounded" >
        <div class=" pb-2 ml-2" style="margin: 17px;">
                 <div  class="res"> <h5> <i class="fas fa-lightbulb"></i>   Showing results for <span style="color: red"> "<?php echo e($search); ?>" </span> </h4>

                </div>


      

        <div class="row">
               
                    <h5 class="text-muted ">Sort by</span> 
                   

                  
                        
                        <span class="price"><span  class="btn btn-secondary  btn-sm price"   value="price"><b>Price</b></span></span>
                        <span class="pop" ><span class="btn btn-secondary btn-sm  popularity" value="rating"><b>Popularity</b></span> </span>         

        </div>




    

    <br> <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <input type="hidden" value=" $p = $p->pID "> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          
    <div class="row  causes_div" >
    <div class="row"  id="my-datatable"  >
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($p == null): ?>
                            none
                            <?php else: ?>

                        <?php
                        $sold = Order::where('oStat', 'c')
                        ->where('pID', $p )
                        ->sum('oQty'); 
                        ?>



                <div id="xup" class="box" >
                    <div class="box-img" style="padding: 6px;  margin: 3px;">
                   
                        <a href="/onclick/<?php echo e($p->pID); ?> ">     

                        <div class=""  > 
                
                            <img  src="products/<?php echo e($p->pdImg); ?>" alt="Card image cap" height="210"> 
                                    <h6 style="font-weight: lighter; color: black"  class="square" style=" width:50;" ><?php echo e($p->pdNam); ?></p>
                                    <h6 id="view" style="margin-top:-7%;"> ₱ <?php echo e($p->pdPrc); ?></h6>
                                    <h id="view" style="float:right; font-size:10pt;" >Sold: <?php echo e($sold); ?> </h> 
                                </h6>  
                                  </a>

                            
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </div>   
            </div>
        </div>
    </div>
</div>


<script>
    function goBack() {
    window.history.back();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.search-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jelai\mxm_proj\resources\views/users/view_search_product.blade.php ENDPATH**/ ?>