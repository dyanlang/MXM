<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use App\Models\Delivery;
use App\Models\Message;

use Illuminate\Http\Request;
use Image;
use Auth;
use Session;
use DB;
use Carbon\Carbon;

class OrderController extends Controller
{


    public function onclick($pID)
    { 

        $onclick = User::join('prdt_tb', 'prdt_tb.uID', '=', 'users_tb.id')
        ->where('prdt_tb.pID', $pID)
        ->get();

        $sID = Product::where('pID',   $pID)->get('uID'); #GET PRODUCT SELLER ID
                foreach($sID as $UID ){
                     {{  $SID =  $UID->uID; }}
                } #Just to remove from the list
        $pdNam = Product::where('uID',   $SID)->count('pdNam'); # COUNT THE SELLER'S PRODUCTS

          
        $reviewCount = Review::join('prdt_tb', 'prdt_tb.pID', '=', 'reviews.pID')
        ->where('reviews.pID', $pID)
        ->count('review');

        $sellCount = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
        ->where('order_tb.pID', $pID)
        ->where('order_tb.oStat', 'c')
        ->sum('oStat');



        $allCount = round(Review::join('prdt_tb', 'prdt_tb.uID', '=', 'reviews.sID')
        ->where('prdt_tb.uID', '22')
        ->where('rtype', 'x')
        ->avg('rating' ),0) ;

        
        $review = Review::join('prdt_tb', 'prdt_tb.pID', '=', 'reviews.pID')
        ->join('users_tb')
        ->where('reviews.pID', $pID)
        ->where('rtype', 'x')
        ->get(); # COUNT THE SELLER'S PRODUCTS

        
        $x ='x';

        $total = round(Review::where('rtype', $x)
        ->where('pID', $pID)
        ->avg('rating' ),1) ;

    	return view('users.onclick',   compact('onclick' , 'pdNam', 'review', 'reviewCount', 'total', 'allCount', 'sellCount'));

    }

    public function category($pdCat)
    { 

        $category = Product::where('pdCat', $pdCat)
        ->get();

    	return view('users.category',   compact('category'));

    }

    public function chatcount(){

        $uID = Auth()->user()->id;

        $chatcount = DB::table('mes_tb')->where('uID', $uID)
        ->orWhere('sID', $uID)
        ->where('mRead', '1' )
        ->count('sID');

        return response()->json(['count' => $chatcount]);
    }


    public function cartcount(){
        $x ='x';
        $uID = Auth()->user()->id;

        $cartcount = Order::where('oStat', $x)
        ->where('uID', $uID)
        ->count('pID');

        return response()->json(['count' => $cartcount]);
    }

    public function coutcount(){
        $x ='u';
        $uID = Auth()->user()->id;

        $coutcount = Order::where('cout', $x)
        ->where('uID', $uID)
        ->count('pID');

        return response()->json(['bilang' => $coutcount]);
    }

    public function total(){
        $x ='u';
        $uID = Auth()->user()->id;

        $totalS = Order::where('cout', $x)
        ->where('uID', $uID)
        ->sum('price');

        $Qty = Order::where('cout', $x)
        ->where('uID', $uID)
        ->sum('oQty');
            
        return response()->json(['total' => $totalS]);
    }



    public function cart(Request $request )
    {
        $x = "x";  // ADD TO CART STATUS //
        $u = "u";
        $uID = Auth()->user()->id;
       

        $store_name = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                    ->leftjoin('users_tb', 'users_tb.id', '=', 'order_tb.sID')
                    ->where('order_tb.oStat', $x)
                    ->where('order_tb.uID', $uID) 
                    ->groupby('order_tb.sID' )
                    ->orderby('order_tb.updated_at', 'ASC')
                    ->get();

        $checklist = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->leftjoin('users_tb', 'users_tb.id', '=', 'prdt_tb.uID')
                ->where('order_tb.oStat', $x)
                ->where('cout', $u)
                ->where('order_tb.uID', $uID)
                ->get();

        return view('users.cart',  compact( 'checklist', 'store_name'));
    }

    public function cout(Request $request){

        $uID = Auth()->user()->id;
        $oID = $request->oID;   

         DB::table('order_tb')
                ->where('uID', $uID)
                ->where('oStat', 'x')
                ->whereIn('oID',explode(",",$oID))
                ->update(['cout' => 'u' ]);

          return back()->with('added', 'Item successsfully added to cart!');  

       
    }

    public function addToCart(Request $request, $pID)
    {
        
        $x = ['c', 'x', 's', 'p', 'r'];
        $uID = Auth()->user()->id;
        $timestamp = Carbon::now()->timezone('Asia/Manila');
      
        $pri = Order::where('pID' , $pID)
        ->where('oStat', 'x')
        ->where('uID', $uID)
        ->count('pID'); // PRODUCT ID COUNT

        $prq = Order::where('pID' , $pID)
        ->where('oStat', 'x')
        ->where('uID', $uID)
        ->get();
            foreach($prq as $q ){
                {{ $count= $q->oQty; }}    
            }

    // FOR SAVING
    $product = new Order();
        $product->uID = $uID;
        $product->pID = $pID;
        $product->sID = request('sID');
        $product->oQty = request('Qty');  
        $product->price = request('price');
        $product->oStat = request('oStat'); 
        $product->updated_at = $timestamp;
        $product->created_at = $timestamp;
       
      
    if($pri ==  null) {
        $product->save();
        return back()->with('added', 'Item successsfully added to cart!');  
    
    }elseif($pri  >= 1){
        $product->oQty = request('Qty');
        $product->oQty = request('oQty');

        if($product->oQty = request('Qty')) {
           
            DB::table('order_tb')->where('pID', $pID)
            ->where('uID', $uID)
            ->where('oStat', 'x')
           
            ->update(['oQty' =>   $count + request('Qty'),
            'updated_at' => $timestamp]);
            return back()->with('added', ' changes!'); 

        }elseif($product->oQty = request('oQty')){
            
            DB::table('order_tb')->where('pID', $pID)
            ->where('uID', $uID)
            ->where('oStat', 'x')
            ->update(['oQty' => request('oQty'), 
                    'updated_at' => $timestamp

        ]);
              return back()->with('added', 'Sav Changes!');  
           
        }else{
            return back()->with('error', 'Try Again');  
        }

    }else{
        return back()->with('error', 'Try Again');  
    }

    }

    public function checkout($pID)
    {       
            $uID = Auth()->user()->id;          // USER ID 
            $checkout = Product::join('users_tb', 'users_tb.id', '=', 'prdt_tb.uID')
            ->where('prdt_tb.pID', $pID)
            ->get();

            return view('/users.checkout',   compact('checkout'));
    }

    
    public function checklist()
    {       
      
        $uID = Auth()->user()->id; 
        $x = "x" ;
        $u = "u"  ;      // USER ID 
        
        $checklist = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
        ->leftjoin('users_tb', 'users_tb.id', '=', 'prdt_tb.uID')
        ->where('order_tb.oStat', $x)
        ->where('order_tb.cout', $u)
        ->where('order_tb.uID', $uID)
        ->get();

            $tQty = count($checklist);

            
        return view('/users.checkout-list',   compact('checklist', 'tQty'));

        
    }


    public function placeorder(Request $request, $oID)
    { 
        $timestamp = now()->timestamp;
        $uID = Auth()->user()->id;          // USER ID 

        DB::table('order_tb')->where('oID', $oID)
        ->insert(['sID' => request('sID'),
        'pID' => request('pID'),
        'uID' => $uID,
        'oCod' => request('COD'),
        'oStat' => request('stat'),
        'oMode' => request('mode'),
        'oQty' => request('oQty'),
        'oMes' => request('oMes'),

        ]);
        return Redirect('home')->with('message', 'Successfully added!');
    }

    public function orderlist(Request $request)
    { 
        $timestamp = now()->timestamp;
        $uID = Auth()->user()->id;          // USER ID 
        $u = 'u';

        $orders = Order::find($request->oID);

       $tab = DB::table('order_tb')->where('uID', $uID)->where('cout', $u)
        ->update(['sID' => request('sID'),
        'oCod' => request('COD'),
        'cout' => request('cout'),
        'oStat' => request('stat'),
        'oMode' => request('mode'),
        'oQty' => request('oQty'),
        'oMes' => request('oMes'),

        ]);
    
        return Redirect('home')->with('message', 'Successfully added!');
    }


    public function delete($oID){ // CART DELETE
        
        Order::find($oID)->delete();
        return back()->with('message', 'Deleted successfully');  
    } 

    public function destroy($oID) // INLINE DELETE
    {
        $uID = Auth()->user()->id;  

        DB::table('order_tb')->where('oID', $oID)
            ->where('uID', $uID)
            ->where('oStat', 'x')
            ->update(['cout' => 'v' ]);

    	return back()->with(['success'=>"Product Deleted successfully.", 'tr'=>'tr_'.$oID]);
    }

    public function deleteAll(Request $request) // ALL SELECTED DELETE
    {
        $oID = $request->oID; 
        $uID = Auth()->user()->id;          // USER ID 

        $v = 'v';

        DB::table('order_tb')
        ->where('uID', $uID)
        ->where('oStat', 'x')
        ->whereIn('oID',explode(",",$oID))
        ->update(['cout' => $v ]);
        
        return back()->with(['success'=>"Products Deleted successfully."]);
    }
    public function Removefromtable(Request $request) // ALL SELECTED DELETE
    {
        $oID = $request->oID; 
        $uID = Auth()->user()->id;          // USER ID 

        $v = 'v';

        DB::table('order_tb')
        ->where('uID', $uID)
        ->where('oStat', 'x')
        ->whereIn('oID',explode(",",$oID))
        ->delete();
        
        return back()->with(['success'=>"Products Deleted successfully."]);
    }

    
    
   


    /// ------------------------------------------------///
  

    public function store(Request $request, Product $pID)
    {
        $data = $request->input();
        $request->session()->put('Data', $data);

        $output = $request->session()->get('Data');

        $oQty = $output['oQty'];
        $pdPrc = $output['pdPrc'];
        $pdQty = $output['pdQty'];

        $oTol = $pdPrc * $oQty;

        $product = Product::find($pID);

        $minus = $pdQty - $oQty;

        $product->pdQty = $minus;

        $product->save();


        if ($output['pID'] == request('pID')) {
            
            $orders = new Order();

            $orders->uID = request('uID');
            $orders->pID = request('pID');
            $orders->oMode = request('oMode');
            $orders->price = $pdPrc;
            $orders->oQty = $oQty;
            $orders->oTol= $oTol;
            $orders->oDate = strftime();
            $orders->oStat = 'p';
            $orders->oCod = request('oCod');

            $orders->save();

            return view('users.profile');
        }
    }

    // BUYER

    public function profile() 
    {
        $uID = Auth::user()->id;

        $orders = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                    ->join('users_tb', 'users_tb.id', '=', 'prdt_tb.uID')
                    ->where('order_tb.uID', $uID)
                    ->get(['order_tb.*', 'prdt_tb.*']);
                    
        $topay = Order::where('oStat', 'p')->where('uID', $uID)->count();
        $toship = Order::whereIn('oStat', ['s','w'])->where('uID', $uID)->count();
        $toreceive = Order::where('oStat', 'r')->where('uID', $uID)->count();
        $completed = Order::where('oStat', 'c')->where('uID', $uID)->count();
        $cancelled = Order::where('oStat', '5')->where('uID', $uID)->count();
        $returned = Order::where('oStat', 'f')->where('uID', $uID)->count();

        return view('users.profile', compact('orders', 'topay', 'toship', 'toreceive', 'completed', 'cancelled', 'returned'));
    }

    public function view_parcel_buyer(Order $orders, $oID)
    {
        $uID = Auth::user()->id;
        $users = User::where('uType', '1')->get();

        $orders = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->where('order_tb.uID', '=', $uID)
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*', 'order_tb.uID')
                ->get()
                ->find($oID);

        $seller = Order::join('users_tb', 'order_tb.sID', '=', 'users_tb.id')
                ->join('prdt_tb', 'order_tb.pID', '=', 'prdt_tb.pID')
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*')
                ->find($oID);

        $delman = Order::join('users_tb', 'order_tb.del_ID', '=', 'users_tb.id')
                ->join('prdt_tb', 'order_tb.pID', '=', 'prdt_tb.pID')
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*')
                ->find($oID);
                
        // $delman = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.del_ID')
        //         ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
        //         ->where('order_tb.uID', '!=', $uID)
        //         ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*', 'order_tb.uID')
        //         ->get()
        //         ->find($oID);

        return view('users.view_order', compact('orders', 'users', 'seller', 'delman'));
    }

    public function cancel_order(Request $request, $oID)
    {
        $orders = Order::find($request->oID);
        
        $orders->oStat = 5;

        $orders->save();

        Session::flash('cancelled');

        return back();
    }

    public function order_received(Request $request, $oID)
    {
        $orders = Order::find($request->oID);
        
        $orders->oStat = 'c';

        $orders->save();

        Session::flash('received');

        return back();
    }
    

    // SELLER


    public function sel_report()
    {
        $sID = Auth::user()->id;

        $products = Product::join('users_tb', 'users_tb.id', '=', 'prdt_tb.uID')
                        ->join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')
                        ->where('prdt_tb.uID', '=', $sID)
                        ->select('users_tb.*', 'prdt_tb.*')
                        ->get();

        $sold = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')
                        ->where('order_tb.sID', '=', $sID)
                        ->where('order_tb.oStat', '=', 'c')
                        ->count();

        $orders = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                        ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                        ->where('order_tb.sID', '=', $sID)
                        ->get(['users_tb.*', 'prdt_tb.*', 'order_tb.*']);


        return view('seller.sel_report', compact('products', 'sold', 'orders'));
    }

    public function sel_history()
    {
        $uID = Auth::user()->id;

        $pending = Order::where('oStat','p')->where('sID', $uID)->count();
        $toship = Order::whereIn('oStat', ['s','w'])->where('sID', $uID)->count();
        $toreceive = Order::where('oStat', 'r')->where('sID', $uID)->count();
        $completed = Order::where('oStat', 'c')->where('sID', $uID)->count();
        $cancelled = Order::where('oStat', '5')->where('sID', $uID)->count();
        $return = Order::whereIn('RFcon', ['y', 'n'])->where('sID', $uID)->count();

        $buyers = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->whereIn('order_tb.RFcon', ['y', 'n'])
                ->where('order_tb.sID', '=', $uID)
                ->orderBy('order_tb.oID')
                ->get();

        $orders = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->where('order_tb.uID', '!=', $uID)
                ->where('order_tb.sID', '=', $uID)
                ->get();

        return view('seller.seller_history', compact('buyers', 'orders', 'pending', 'toship', 'toreceive', 'completed', 'cancelled', 'return'));
    }

    public function view_order(Order $orders, $oID)
    {
        $uID = Auth::user()->id;

        $users = User::where('uType', '1')->get();

        $orders = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->where('order_tb.uID', '!=', $uID)
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*', 'order_tb.uID')
                ->get()
                ->find($oID);

        $delman = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.del_ID')
                ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->where('order_tb.uID', '!=', $uID)
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*', 'order_tb.uID')
                ->get()
                ->find($oID);

        return view('seller.view_order', compact('orders', 'users', 'delman'));
    }

    public function confirm_order(Request $request, $oID)
    {
        $orders = Order::find($request->oID);
        
        $orders->oStat = 's';

        $orders->save();

        Session::flash('success', 'Order Updated!');

        return back();

    }

    public function request_order(Request $request, $oID)
    {
        $orders = Order::find($request->oID);
        
        $orders->del_ID = request('del_ID');
        $orders->oStat = 'w';
        $orders->dReason = '';
        $orders->dAct = 1;

        $orders->save();

        Session::flash('success', 'Order Updated!');

        return back();

    }

    public function cancel_req(Request $request, $oID)
    {
        $orders = Order::find($request->oID);

        $orders->dRev = request('dRev');
        $orders->dRev_Stat = request('dRev_Stat');
        $orders->oStat = 's';
        $orders->dAct = 0;
        $orders->sAct = 1;

        $orders->save();

        Session::flash('success');

        return back();
        
    }

    public function pick_up(Request $request, $oID)
    {
        $orders = Order::find($request->oID);
        
        $orders->sRev = request('sRev');
        $orders->sRev_Stat = request('sRev_Stat');
        $orders->oStat = 'r';
        $orders->pDate = strftime('%Y-%m-%d %H:%M:%S');

        $orders->save();

        Session::flash('success');

        return back();
    }

    public function return_product(Request $request, $oID)
    {

        $orders = Order::find($request->oID);

        if ($request->hasFile('RFimg')){

            request()->validate([
                'RFimg' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:255',
            ]);
            
    		$RFimg = $request->file('RFimg');
    		$return_img = time() . '.' . $RFimg->getClientOriginalExtension();
    		Image::make($RFimg)->resize(300, 300)->save( public_path('return_products/' . $return_img) );

    		
    	}

        $orders->RFimg = $return_img;
        $orders->RFrsn = request('RFrsn');
        $orders->RFdat = strftime('%Y-%m-%d %H:%M:%S');
        $orders->save();

        Session::flash('return_request');

        return back();
        
    }

    public function return_refund_list()
    {
        $auth = Auth::user()->id;

        $buyers = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->where('order_tb.RFcon', '=', '1')
                ->where('order_tb.sID', '=', $auth)
                ->orderBy('order_tb.oID')
                ->get();

        $reqCount = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                ->where('order_tb.RFdat', '!=', 'null')
                ->where('order_tb.sID', '=', $auth)
                ->orderBy('order_tb.oID')
                ->count();

        return view('/seller.return_request', compact('buyers', 'reqCount'));
    }

    public function view_return(Order $orders, $oID)
    {
        $sID = Auth::user()->id;

        $delman = User::where('uType', '1')->get();

        // $orders = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
        //         ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
        //         ->where('order_tb.sID', '=', $sID)
        //         // ->where('order_tb.uID', '!=', $sID)
        //         ->get(['users_tb.*', 'prdt_tb.*', 'order_tb.*'])
        //         ->find($oID);

        $delman2 = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.del_ID')
                ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->where('order_tb.uID', '!=', $sID)
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*', 'order_tb.uID')
                ->get()
                ->find($oID);

        $orders = Order::join('users_tb', 'users_tb.id', '=', 'order_tb.uID')
                ->join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                ->where('order_tb.uID', '!=', $sID)
                ->where('order_tb.sID', '=', $sID)
                ->select('users_tb.*', 'order_tb.*', 'prdt_tb.*')
                ->get()
                ->find($oID);

        return view('/seller.view_return', compact('orders', 'delman', 'delman2'));
    }

    public function accept_return(Request $request, $oID)
    {
        $orders = Order::find($request->oID);
        
        $orders->RFcon = y; //accepted
        $orders->RFcd = strftime('%Y-%m-%d %H:%M:%S');
        $orders->RFstatus = 's';
        // $orders->RFstatus = 'p';
        // $orders->RFdelman = request('RFdelman');
        
        $orders->save();

        return back();
    }

    public function decline_return(Request $request, $oID)
    {
        $orders = Order::find($request->oID);
        
        $orders->RFcon = n; //rejected
        $orders->RFcd = null;
        
        $orders->save();

        Session::flash('decline_return');

        return back();
    }

    public function send_return_request(Request $request, $oID)
    {
        $orders = Order::find($request->oID);
        
        $orders->RFdelman = request('RFdelman');
        $orders->RFstatus = 'p';

        $orders->save();

        Session::flash('send_return_request');

        return back();

    }

    public function cancel_rf_req(Request $request, $oID)
    {
        $orders = Order::find($request->oID);
        
        $orders->RFdelman = 0;
        $orders->RFstatus = 's';

        $orders->save();

        // Session::flash('cancel_rf_req');

        return back();

    }

    public function item_received(Request $request, $oID)
    {
        $orders = Order::find($request->oID);
        
        $orders->oStat = 'f';
        $orders->RFstatus = 'd';
        $orders->RFdelivered = strftime('%Y-%m-%d %H:%M:%S');

        $orders->save();

        Session::flash('item_received');

        return back();
    }

}
