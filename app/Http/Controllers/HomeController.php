<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Delivery;
use Image;
use Auth;
use Session;
use DB;

class HomeController extends Controller
{

    public function home()
    {

        if (Auth()->user()->uType == '5' && Auth()->user()->uStat == '0') 
        {
            $prod = Product::where('pdType', '=', '1')->get('pID');  $prodNo = count($prod);
            $total_sold = Product::where('pdType', '=', '2')->get('pID');  $sold = count($total_sold);
            $order = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'p')->get('order_tb.oID');  $orderNo = count($order);
            $pick = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'w')->get('order_tb.oID');  $pickNo = count($pick);
            $ship = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 's')->get('order_tb.oID');  $shipNo = count($ship);
            $receive = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'r')->get('order_tb.oID');  $recNo = count($receive);
            $complete = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'c')->get('order_tb.oID');  $success = count($complete);
            $cancelled1 = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.dAct', '=', '3')->get('order_tb.oID');  $canDelivery = count($cancelled1);
            $cancelled2 = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.sAct', '=', '1')->get('order_tb.oID'); $cancelReq = count($cancelled2);
            

            $users = Order::select(\DB::raw("COUNT(*) as count"))
            ->where('oStat', 'x') // complete // 
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');
          
            // STATTUS = X IS TEMPORARY SOON CHANGE TO S = SOLD
            $B01 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'B1')->where('oStat', 'x') ->get('order_tb.pID');   $B1  = count($B01);          
            $C01 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'C1')->where('oStat', 'x') ->get('order_tb.pID');   $C1  = count($C01);   
            $G01 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'G1')->where('oStat', 'x') ->get('order_tb.pID');   $G1  = count($G01);   
            $G02 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'G2')->where('oStat', 'x') ->get('order_tb.pID');   $G2  = count($G02);   
            $W01 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'W1')->where('oStat', 'x') ->get('order_tb.pID');   $W1  = count($W01);   
            $W02 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'W2')->where('oStat', 'x') ->get('order_tb.pID');   $W2  = count($W02);   
            $W03 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'W3')->where('oStat', 'x') ->get('order_tb.pID');   $W3  = count($W03);   
            $W04 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'W4')->where('oStat', 'x') ->get('order_tb.pID');   $W4  = count($W04);   
            $M01 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'M1')->where('oStat', 'x') ->get('order_tb.pID');   $M1  = count($M01);   
            $M02 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'M2')->where('oStat', 'x') ->get('order_tb.pID');   $M2  = count($M02);   
            $M03 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'M3')->where('oStat', 'x') ->get('order_tb.pID');   $M3  = count($M03);   
            $M04 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'M4')->where('oStat', 'x') ->get('order_tb.pID');   $M4  = count($M04);   
            $M05 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'M5')->where('oStat', 'x') ->get('order_tb.pID');   $M5  = count($M05);   
            $M06 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'M6')->where('oStat', 'x') ->get('order_tb.pID');   $M6  = count($M06);   
            $M07 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'M7')->where('oStat', 'x') ->get('order_tb.pID');   $M7  = count($M07);   
            $H01 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'H1')->where('oStat', 'x') ->get('order_tb.pID');   $H1  = count($H01);   
            $H02 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'H2')->where('oStat', 'x') ->get('order_tb.pID');   $H2  = count($H02);   
            $H03 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'H3')->where('oStat', 'x') ->get('order_tb.pID');   $H3  = count($H03);   
            $H04 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'H4')->where('oStat', 'x') ->get('order_tb.pID');   $H4  = count($H04);   
            $T01 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'T1')->where('oStat', 'x') ->get('order_tb.pID');   $T1  = count($T01);   
            $S01 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'S1')->where('oStat', 'x') ->get('order_tb.pID');   $S1  = count($S01);   
            $P01 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'P1')->where('oStat', 'x') ->get('order_tb.pID');   $P1  = count($P01);   
            $O01 = Product::join('order_tb','order_tb.pID','=','prdt_tb.pID')->where('pdCat', 'O1')->where('oStat', 'x') ->get('order_tb.pID');   $O1  = count($O01); 
            
            return view('admin.ad_home', compact('prodNo', 'sold', 'orderNo', 'pickNo', 'shipNo', 'recNo', 'success', 'canDelivery', 'cancelReq', 'users', 
            'B1', 'C1', 'G1', 'G2', 'W1', 'W2', 'W3', 'W4', 'M1', 'M2', 'M3', 'M4', 'M5', 'M6', 'M7', 'H1', 'H2', 'H3', 'H4', 'T1', 'S1', 'P1', 'O1'));
        }

        else if (Auth()->user()->uType == '4' && Auth()->user()->uStat == '0')
        {
            $seller = User::where('activated_seller','a')->get();  $selNo = count($seller);
            $delman = User::where('activated_delman', 'a')->get();  $delNo = count($delman);

            $pick = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'w')->get('order_tb.oID');  $pickNo = count($pick);
            $prod = Product::where('pdType', '=', '1')->get('pID');  $prodNo = count($prod);
            $pay = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'p')->get('order_tb.oID');  $payNo = count($pay);
            $ship = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'w')->get('order_tb.oID');  $shipNo = count($ship);
            $receive = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'r')->get('order_tb.oID');  $recNo = count($receive);
            $comp = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'c')->get('order_tb.oID');  $completed = count($comp);
            $cancelled = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.dAct', '=', '3')->get('order_tb.oID');  $can = count($cancelled);
            $cancelled2 = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.sAct', '=', '1')->get('order_tb.oID'); $cancelReq = count($cancelled2);

            return view('employee.emp1_home', compact('delNo', 'selNo', 'pickNo', 'prodNo', 'payNo', 'shipNo', 'recNo', 'completed', 'can', 'cancelReq'));
        }

        else if (Auth()->user()->uType == '3' && Auth()->user()->uStat == '0')
        {
            // $seller = User::where('uType', '2')->get();  $selNo = count($seller);
            // $prod = Product::where('pdType', '=', '1')->get('pID');  $prodNo = count($prod);
            // $pick = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'w')->get('order_tb.oID');  $pickNo = count($pick);
            // $ship = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 's')->get('order_tb.oID');  $shipNo = count($ship);
            // $receive = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'r')->get('order_tb.oID');  $recNo = count($receive);
            // $complete = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'c')->get('order_tb.oID');  $success = count($complete);
            // $cancelled1 = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.dAct', '=', '3')->get('order_tb.oID');  $canDelivery = count($cancelled1);

            // return view('customer_service.cs_home', compact('selNo', 'shipNo', 'prodNo', 'recNo', 'success', 'canDelivery'));
        

            $seller = User::where('uType', '2')->get();  $selNo = count($seller);
            $delman = User::where('uType', '1')->get();  $delNo = count($delman);
            $pick = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'w')->get('order_tb.oID');  $pickNo = count($pick);
            $prod = Product::where('pdType', '=', '1')->get('pID');  $prodNo = count($prod);
            $pay = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'p')->get('order_tb.oID');  $payNo = count($pay);
            $ship = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'w')->get('order_tb.oID');  $shipNo = count($ship);
            $receive = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'r')->get('order_tb.oID');  $recNo = count($receive);
            $comp = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'c')->get('order_tb.oID');  $completed = count($comp);
            $cancelled = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.dAct', '=', '3')->get('order_tb.oID');  $can = count($cancelled);

            return view('customer_service.cs_home', compact('delNo', 'selNo', 'pickNo', 'prodNo', 'payNo', 'shipNo', 'recNo', 'completed', 'can'));
        }
    
        
        else if (Auth()->user()->uType == '2' && Auth()->user()->uStat == '0')
        {
            $sID = Auth::user()->id;

            $date = date_default_timezone_set('Asia/Manila');

            $prod = Product::where('uID', '=', $sID)->where('pdType', '=', '1')->get('pID');  $prodNo = count($prod);
            $total_sold = Product::where('uID', '=', $sID)->where('pdType', '=', '2')->get('pID');  $sold = count($total_sold);
            $order = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'p')->where('order_tb.sID', '=', $sID)->get('order_tb.oID');  $orderNo = count($order);
            $pick = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'w')->where('order_tb.sID', '=', $sID)->get('order_tb.oID');  $pickNo = count($pick);
            $ship = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 's')->where('order_tb.sID', '=', $sID)->get('order_tb.oID');  $shipNo = count($ship);
            $receive = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'r')->where('order_tb.sID', '=', $sID)->get('order_tb.oID');  $recNo = count($receive);
            $complete = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.oStat', 'c')->where('order_tb.sID', '=', $sID)->get('order_tb.oID');  $success = count($complete);
            $cancelled1 = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.dAct', '=', '3')->where('order_tb.sID', '=', $sID)->get('order_tb.oID');  $canDelivery = count($cancelled1);
            $cancelled2 = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.sAct', '=', '1')->where('order_tb.sID', '=', $sID)->get('order_tb.oID'); $cancelReq = count($cancelled2);
            $RFdat = Product::join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')->where('order_tb.RFdat', '!=', 'NULL')->where('order_tb.sID', '=', $sID)->get('order_tb.oID'); $return_request = count($RFdat);

            return view('seller.sel_home', compact('prodNo', 'sold', 'orderNo', 'pickNo', 'shipNo', 'recNo', 'success', 'canDelivery', 'cancelReq', 'return_request'));

        }

        else if (Auth()->user()->uType == '1' && Auth()->user()->uStat == '0')
        {
            $del_ID = Auth::user()->id;

            $total_request = Order::where('oStat', 'w')
                        ->where('dAct', '1')
                        ->where('del_ID', $del_ID)
                        ->count();

            $total_return_request = Order::where('RFstatus', '=', 'p')
                        ->where('RFdelman', $del_ID)
                        ->count();

            $todolist = Order::where('oStat', 'w')
                        ->where('dAct', '2')
                        ->where('del_ID', $del_ID)
                        ->count();

            $requests = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
                        ->where('order_tb.del_ID', '=', $del_ID)
                        ->where('order_tb.RFdelman', '=', $del_ID)
                        ->select('prdt_tb.*', 'order_tb.*')
                        ->get();

          

            // $todo = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
            //         ->where('order_tb.del_ID', '=', $del_ID)
            //         ->select('prdt_tb.*', 'order_tb.*')
            //         ->get();
            
            return view('delivery.delman_home', compact('total_request', 'todolist', 'requests', 'total_return_request'));
        }

        else if (Auth()->user()->uType == '0' && Auth()->user()->uStat == '0') 
        {

            $products = Product::get();

            $top = Order::join('prdt_tb', 'prdt_tb.pID', '=', 'order_tb.pID')
            ->where('order_tb.oStat', 'c')
            ->get();

            return view ('users.Home',compact('products', 'top') );
        }

        else if (Auth()->user()->uType == '0' && Auth()->user()->uStat == '1') 
        {
            return view ('deact.deact_home');
        }

        else if (Auth()->user()->uType == '0' && Auth()->user()->uStat == '1')
        {
            return view ('deact.deact_home');
        }

        else if (Auth()->user()->uType == '1' && Auth()->user()->uStat == '1')
        {
            return view ('deact.deact_home');
        }

        else if (Auth()->user()->uType == '2' && Auth()->user()->uStat == '1')
        {
            return view ('deact.deact_home');
        }

        else if (Auth()->user()->uType == '3' && Auth()->user()->uStat == '1')
        {
            return view ('deact.deact_home');
        }

        else if (Auth()->user()->uType == '4' && Auth()->user()->uStat == '1')
        {
            return view ('deact.deact_home');
        }

        else if (Auth()->user()->uType == '5' && Auth()->user()->uStat == '1')
        {
            return view ('deact.deact_home');
        }
            
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/home');
    }
}
